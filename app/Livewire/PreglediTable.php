<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pacijent;
use App\Models\Pregled;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\Writer\Word2007;
use Exception;

class PreglediTable extends Component
{
    public $idpacijenta;
    public $prvi_kontrolni = 2;
    public $vrsta_pregleda = 1;
    public $angioloski = 0;
    public $nalaz;
    public $showModal = false;
    public $content;
    public $pregledId;

    protected $rules = [
        'idpacijenta' => 'required|exists:pacijenti,idpacijenta',
        'prvi_kontrolni' => 'nullable|in:1,2',
        'vrsta_pregleda' => 'required|integer|min:1',
    ];

    public function mount($idpacijenta = null)
    {
        $this->idpacijenta = $idpacijenta;
        // Ensure storage dir exists
        if (!Storage::disk('local')->exists('nalazi')) {
            Storage::disk('local')->makeDirectory('nalazi');
        }
    }

    public function render()
    {
        $pacijent = $this->idpacijenta ? Pacijent::where('idpacijenta', $this->idpacijenta)->first() : null;
        $pregledi = $this->idpacijenta ? Pregled::where('idpacijenta', $this->idpacijenta)->orderBy('datum', 'desc')->get() : collect();
        return view('livewire.pregledi-table', compact('pacijent', 'pregledi'));
    }

    public function savePregled()
    {
        $this->nalaz = $this->nalaz ?? ''; // osiguraj da nije null
        $this->validate();

        // Ako vrsta_pregleda nije 1, angioloski postavi na 0 ako je null
        if ($this->vrsta_pregleda != 1) {
            $this->angioloski = $this->angioloski ?? 0;
        }

        // kreiraj pregled u bazi
        $pregled = new Pregled();
        $pregled->idpacijenta = $this->idpacijenta;
        $pregled->prvi_kontrolni = $this->prvi_kontrolni;
        $pregled->vrsta_pregleda = $this->vrsta_pregleda;
        $pregled->angioloski = $this->angioloski;
        $pregled->datum = now();
        $pregled->save();

        //ako je uspešno kreiran, kreiraj Word nalaz
        if ($pregled->exists) {
            try {
                // kreiraj Word fajl
                $this->createNalaz($this->nalaz ?? '', $this->idpacijenta, $pregled->idpregleda ?? $pregled->getKey());

                session()->flash('message', 'Pregled i nalaz su uspešno kreirani!');

                // resetuj samo sadržaj TinyMCE i angioloski
                $this->reset(['nalaz', 'angioloski']);
                $this->dispatch('refreshPregledi');
            } catch (Exception $e) {
                // ako Word fajl ne uspe, obriši DB zapis
                $pregled->delete();
                session()->flash('message', 'Greška prilikom kreiranja Word nalaza: ' . $e->getMessage());
            }
        } else {
            session()->flash('message', 'Greška prilikom kreiranja pregleda!');
        }
        return redirect()->route('doktor');
    }

    // Kreira Word (.docx) iz HTML sadržaja i čuva na disk/lokalno skladište.
    protected function createNalaz(string $nalazContent, $idpacijenta, $idpregleda): string
    {
        // create phpword and add html
        $phpWord = new PhpWord();
        $section = $phpWord->addSection();
        // Html::addHtml can throw, wrap in try/catch above
        Html::addHtml($section, $nalazContent ?? '', false, false);

        $phpWord->setDefaultFontSize(12);
        $phpWord->setDefaultFontName('Arial');

        // prepare filename and path
        $fileName = "{$idpacijenta}-{$idpregleda}.docx";
        $relativePath = "nalazi/{$fileName}";

        // Use a temporary stream to write the docx and then store via Storage
        $tempFile = tmpfile();
        $meta = stream_get_meta_data($tempFile);
        $tmpFilename = $meta['uri'];

        // write using Word2007 writer
        $writer = new Word2007($phpWord);
        $writer->save($tmpFilename);

        // read temp file and put into storage
        $contents = file_get_contents($tmpFilename);
        Storage::disk('local')->put($relativePath, $contents);

        // close and remove temp
        fclose($tempFile);

        return $relativePath;
    }

    public function loadPregled($idpregleda)
    {
        $pregled = Pregled::find($idpregleda);

        if (!$pregled) {
            session()->flash('message', 'Pregled ne postoji.');
            return;
        }

        $relativePath = $this->findPregledFile($pregled->idpacijenta, $pregled->idpregleda);

        if (!$relativePath) {
            session()->flash('message', 'Fajl ne postoji.');
            return;
        }

        $fullPath = Storage::disk('local')->path($relativePath);

        try {
            $phpWord = IOFactory::load($fullPath);
            $content = '';

            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                        foreach ($element->getElements() as $child) {
                            if ($child instanceof \PhpOffice\PhpWord\Element\Text) {
                                $content .= htmlspecialchars($child->getText()) . '<br>';
                            }
                        }
                    } elseif ($element instanceof \PhpOffice\PhpWord\Element\Text) {
                        $content .= htmlspecialchars($element->getText()) . '<br>';
                    }
                }
            }

            $this->pregledId = $idpregleda;
            $this->content = $content;
        } catch (Exception $e) {
            session()->flash('message', 'Greška pri učitavanju nalaza: ' . $e->getMessage());
        }

        $this->dispatch('open-nalaz-modal', [
            'content' => $this->content,
        ]);
    }

   public function downloadPregled($idpregleda)
    {
        $pregled = Pregled::findOrFail($idpregleda);

        // Traži fajl sa podržanim ekstenzijama
        $extensions = ['docx', 'doc'];
        $relativePath = $this->findPregledFile($pregled->idpacijenta, $pregled->idpregleda, $extensions);

        if (!$relativePath) {
            session()->flash("message", "Fajl ne postoji.");
            return;
        }

        // Ekstraktujemo ekstenziju iz puta da bismo je iskoristili za download ime
        $ext = pathinfo($relativePath, PATHINFO_EXTENSION);
        $downloadName = "{$pregled->pacijent->imeprezime}.{$ext}";

        $fullPath = Storage::disk('local')->path($relativePath);

        $this->dispatch('osvezi-tinymce');
        
        return response()->download($fullPath, $downloadName);
    }

    public function deletePregled($idpregleda)
    {
        $pregled = Pregled::findOrFail($idpregleda);
        $relativePath = "private/nalazi/{$pregled->idpacijenta}-{$pregled->idpregleda}.doc";

        if (Storage::disk('local')->exists($relativePath)) {
            Storage::disk('local')->delete($relativePath);
        }

        $pregled->delete();
        session()->flash('message', 'Pregled uspešno obrisan!');
        $this->dispatch('osvezi-tinymce');
    }

    protected function findPregledFile($idpacijenta, $idpregleda, array $extensions = ['docx', 'doc', 'rtf'])
    {
        foreach ($extensions as $ext) {
            $path = "nalazi/{$idpacijenta}-{$idpregleda}.{$ext}";
            if (Storage::disk('local')->exists($path)) {
                return $path;
            }
        }
        return null; // nijedan fajl ne postoji
    }
}

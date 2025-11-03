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
        // Osiguraj da storage nalazi postoji
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
        $this->nalaz = $this->nalaz ?? ''; //Operator nultog spajanja, ako nalaz nije null, koristi nalaz. Ako je null, koristi prazan string
        $this->validate();

        // Ako vrsta_pregleda nije 1 angioloski, postavi na 0
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

    // Kreira Word (.docx) iz HTML sadržaja i čuva u app lokalno.
    protected function createNalaz(string $nalazContent, $idpacijenta, $idpregleda): string
    {
        // preuzmi HTML sadržaj
        $html = $nalazContent;

        // Zameni sve <br> sa self-closing <br/>
        $html = str_replace(['<br>', '<br >'], '<br/>', $html);

        // Ukloni prazne <p>
        $html = preg_replace('/<p>\s*<\/p>/', '', $html);

        // Ukloni sve script/style tagove
        $html = preg_replace('#<(script|style).*?>.*?</\1>#si', '', $html);

        // konvertuj <div style="text-align:center"> u <p style="text-align:center">
        $html = preg_replace('#<div(.*?)>#i', '<p$1>', $html);
        $html = str_replace('</div>', '</p>', $html);

        // Kreiraj PhpWord dokument
        $phpWord = new PhpWord();
        $phpWord->setDefaultFontName('Arial');
        $phpWord->setDefaultFontSize(12);

        $section = $phpWord->addSection();

        try {
            // dodaj HTML u sekciju
            Html::addHtml($section, $html, false, false);
        } catch (Exception $e) {
            throw new Exception('Greška prilikom parsiranja HTML sadržaja za Word: ' . $e->getMessage());
        }

        // Pripremi putanju za čuvanje
        $fileName = "{$idpacijenta}-{$idpregleda}.docx";
        $relativePath = "nalazi/{$fileName}";
        $fullPath = Storage::disk('local')->path($relativePath);

        // Sačuvaj Word dokument
        $writer = new Word2007($phpWord);
        $writer->save($fullPath);

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

                    // Paragrafi sa više Text elemenata
                    if ($element instanceof \PhpOffice\PhpWord\Element\TextRun) {
                        $paragraphText = '';

                        foreach ($element->getElements() as $child) {
                            if ($child instanceof \PhpOffice\PhpWord\Element\Text) {
                                $paragraphText .= $child->getText();
                            } elseif ($child instanceof \PhpOffice\PhpWord\Element\TextBreak) {
                                $paragraphText .= "\n"; // čuva line break
                            }
                        }
                        $paragraphText = trim($paragraphText, "\r\n ");

                        // Dodaje alignment
                        $alignment = 'left';
                        $style = $element->getParagraphStyle();
                        if ($style && method_exists($style, 'getAlignment')) {
                            $alignVal = $style->getAlignment();
                            if ($alignVal) {
                                $alignment = strtolower($alignVal);
                            }
                        }

                        // Uključi prazne paragrafe
                        if ($paragraphText === '') {
                            $content .= "<div style='height: 1em;'>&nbsp;</div>";
                        } else {
                            $content .= "<div style='text-align: {$alignment}; margin-bottom: 6px; white-space: pre-line;'>"
                                . htmlspecialchars($paragraphText)
                                . "</div>";
                        }
                    }
                    // Uključi pojedinačne Text elemente
                    elseif ($element instanceof \PhpOffice\PhpWord\Element\Text) {
                        $text = trim($element->getText());
                        if ($text === '') {
                            $content .= "<div style='height: 1em;'>&nbsp;</div>";
                        } else {
                            $content .= "<div style='text-align: left; margin-bottom: 6px; white-space: pre-line;'>"
                                . htmlspecialchars($text)
                                . "</div>";
                        }
                    }
                    // Uključi line breakove
                    elseif ($element instanceof \PhpOffice\PhpWord\Element\TextBreak) {
                        $content .= "<br>";
                    }
                }
            }

            $this->pregledId = $idpregleda;
            $this->content = $content;
        } catch (Exception $e) {
            session()->flash('message', 'Greška pri učitavanju nalaza: ' . $e->getMessage());
            return;
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

        // uzmi ekstenziju za ime fajla
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

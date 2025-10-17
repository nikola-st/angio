<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Pregled;
use Illuminate\Support\Facades\Auth;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Element\TextRun;
use PhpOffice\PhpWord\Element\Text;
use Dompdf\Dompdf;
use Dompdf\Options;

class MojiPreglediTable extends Component
{
    public $pregledId;
    public $content = '';
    public $showModal = false;

    public function openModal($id)
    {
        $this->pregledId = $id;
        $this->loadPregled($id);
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->content = '';
    }

    public function loadPregled($id)
    {
        $pregled = Pregled::findOrFail($id);

        if ($pregled->idpacijenta !== Auth::user()->pacijent->idpacijenta) {
            session()->flash('error', 'Nemate pristup ovom nalazu.');
            $this->closeModal();
            return;
        }

        $filePathDoc = storage_path("app/private/nalazi/{$pregled->idpacijenta}-{$pregled->idpregleda}.doc");
        $filePathDocx = storage_path("app/private/nalazi/{$pregled->idpacijenta}-{$pregled->idpregleda}.docx");
        $filePath = file_exists($filePathDocx) ? $filePathDocx : $filePathDoc;

        if (!file_exists($filePath)) {
            session()->flash('error', 'Fajl ne postoji.');
            $this->closeModal();
            return;
        }

        try {
            $phpWord = IOFactory::load($filePath);
            $content = '';

            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if ($element instanceof TextRun) {
                        foreach ($element->getElements() as $child) {
                            if ($child instanceof Text) {
                                $content .= htmlspecialchars($child->getText()) . '<br>';
                            }
                        }
                    } elseif ($element instanceof Text) {
                        $content .= htmlspecialchars($element->getText()) . '<br>';
                    }
                }
            }

            $this->content = $content;
        } catch (\Exception $e) {
            session()->flash('error', 'Greška pri učitavanju Word fajla: ' . $e->getMessage());
            $this->closeModal();
        }
    }

    public function downloadPDF($id)
    {
        $pregled = Pregled::findOrFail($id);

        if ($pregled->idpacijenta !== Auth::user()->pacijent->idpacijenta) {
            session()->flash('error', 'Nemate pristup ovom nalazu.');
            return;
        }

        $filePathDoc = storage_path("app/private/nalazi/{$pregled->idpacijenta}-{$pregled->idpregleda}.doc");
        $filePathDocx = storage_path("app/private/nalazi/{$pregled->idpacijenta}-{$pregled->idpregleda}.docx");
        $filePath = file_exists($filePathDocx) ? $filePathDocx : $filePathDoc;

        if (!file_exists($filePath)) {
            session()->flash('error', 'Fajl ne postoji.');
            return;
        }

        try {
            $phpWord = IOFactory::load($filePath);
            $htmlContent = '';

            foreach ($phpWord->getSections() as $section) {
                foreach ($section->getElements() as $element) {
                    if ($element instanceof TextRun) {
                        foreach ($element->getElements() as $child) {
                            if ($child instanceof Text) {
                                $htmlContent .= htmlspecialchars($child->getText()) . '<br>';
                            }
                        }
                    } elseif ($element instanceof Text) {
                        $htmlContent .= htmlspecialchars($element->getText()) . '<br>';
                    }
                }
            }
            
            // Logo i pečat sa CSS skaliranjem
            $logoPath = public_path('assets/img/logo12pdf.png');
            $pecatPath = public_path('assets/img/pecatpdf.png');

            $html = '<div style="text-align:center;">';
            if (file_exists($logoPath)) {
                $html .= '<img src="' . $logoPath . '" style="width:700px;height:auto;"><br>';
            }
            $html .= '</div>';
            $html .= '<div>' . $htmlContent . '</div>';
            if (file_exists($pecatPath)) {
                $html .= '<div style="text-align:right;margin-top:50px;"><img src="' . $pecatPath . '" style="width:200px;height:auto;"></div>';
            }

            $options = new Options();
            $options->set('isRemoteEnabled', true);
            $options->set('chroot', public_path());
            $options->set('defaultFont', 'DejaVu Sans'); // ovo omogućava čšć
            $dompdf = new Dompdf($options);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            // Sigurno ime fajla
            $imePrezime = preg_replace('/[^a-zA-Z0-9._-]/', '.', $pregled->pacijent->imeprezime);

            return response()->streamDownload(function () use ($dompdf) {
                echo $dompdf->output();
            }, "{$imePrezime}.pdf");
        } catch (\Exception $e) {
            session()->flash('error', 'Greška pri kreiranju PDF-a: ' . $e->getMessage());
            return;
        }
    }

    public function render()
    {
        $pregledi = Pregled::where('idpacijenta', Auth::user()->pacijent->idpacijenta)
            ->orderBy('datum', 'desc')
            ->get();

        return view('livewire.moji-pregledi-table', compact('pregledi'));
    }
}
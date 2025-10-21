<div>
    <div class="container">
        <div class="row">
            {{-- Levi deo: prethodni pregledi --}}
            <div class="col-3">
                <div class="card">
                    <h5 class="card-header text-center">Prethodni pregledi</h5>
                    <div class="card-body text-center">
                        @forelse ($pregledi as $pr)
                            <p>
                                <span class="badge bg-secondary">{{ \Carbon\Carbon::parse($pr->datum)->format('d.m.Y') }}</span>
                                <button wire:click="loadPregled({{ $pr->idpregleda }})" class="btn btn-info btn-sm">
                                    Pogledaj
                                </button>
                                <button wire:click="downloadPregled({{ $pr->idpregleda }})" class="btn btn-success btn-sm">
                                    <i class="fas fa-download"></i>
                                </button>
                                <button wire:click="deletePregled({{ $pr->idpregleda }})" class="btn btn-danger btn-sm">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </p>
                        @empty
                            <p>Nema prethodnih pregleda!</p>
                        @endforelse
                    </div>
                </div>
            </div>

                {{-- Desni deo: forma --}}
                <div class="col-9">

                    @if (session()->has('message'))
                        <div class="d-inline-flex p-2 justify-content-center">
                            <h6 class="alert alert-danger">{{ session('message') }}</h6>
                        </div>
                    @endif

                    <form wire:submit.prevent="savePregled" wire:model.defer="nalaz" id="pregledForm">
                    @csrf
                    <input class="form-control form-control-lg" type="button"
                        value="{{ $pacijent->imeprezime }}, {{ $pacijent->godina_rodjenja }}" readonly>

                    <div class="mb-3">
                        <input type="hidden" wire:model="idpacijenta">
                        <input type="hidden" wire:model="prvi_kontrolni">

                        <label for="vrsta_pregleda" class="form-label mt-3">Vrsta pregleda</label>
                        <select id="vrsta_pregleda" class="form-control form-select form-select-sm w-25"
                                wire:model="vrsta_pregleda" onchange="updateCheckBox(this)">
                            <option value="1">angiološki</option>
                            <option value="2">kardiološki</option>
                            <option value="3">gastroenterološki</option>
                            <option value="4">endokrinološki</option>
                            <option value="5">neurološki</option>
                            <option value="6">ostalo</option>
                        </select>
                    </div>

                    <p class="form-label">Vrsta angiološkog pregleda</p>
                    <div id="angioloski" class="mb-3">
                        @php
                            $angioloskiOpcije = [
                                1 => ['naziv' => 'COLOR-DUPLEX KRVNIH SUDOVA NOGU I DONJIH EKSTREMITETA:', 'label' => 'vene nogu'],
                                2 => ['naziv' => 'COLOR-DUPLEX KRVNIH SUDOVA RUKU I GORNJIH EKSTREMITETA:', 'label' => 'vene ruku'],
                                3 => ['naziv' => 'COLOR-DUPLEX SCAN ARTERIJA DONJIH EKSTREMITETA:', 'label' => 'arterije nogu'],
                                4 => ['naziv' => 'COLOR-DUPLEX ARTERIJA GORNJIH EKSTREMITETA:', 'label' => 'arterije ruku'],
                                5 => ['naziv' => 'COLOR-DUPLEX SCAN KAROTIDNIH I VERTEBRALNIH ARTERIJA EKSTRAKRANIJALNO:', 'label' => 'karotide'],
                                6 => ['naziv' => 'COLOR-DUPLEX ABDOMINALNE AORTE:', 'label' => 'aorta'],
                                7 => ['naziv' => 'COLOR-DUPLEX', 'label' => 'ostalo'],
                            ];
                        @endphp

                        @foreach($angioloskiOpcije as $key => $opcija)
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio"
                                    name="angioloski"
                                    value="{{ $key }}"
                                    id="angi{{ $key }}"
                                    onchange="setContent('{{ $opcija['naziv'] }}')">
                                <label class="form-check-label" for="angi{{ $key }}">
                                    {{ $opcija['label'] }}
                                </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-outline mb-3">
                        <label class="form-label" for="nalaz">NALAZ</label>
                        <div wire:ignore.self>
                        <textarea wire:key="nalaz-editor" class="form-control" id="nalaz" name="nalaz" rows="20">
                            <br><br>
                            <p>{{ $pacijent->imeprezime }}, {{ $pacijent->godina_rodjenja }}</p>
                            <p>{{\Carbon\Carbon::now('GMT+1')->format('d.m.Y')}}</p>
                            <p id="nazivPregleda" style="text-align: center"></p>
                            <br><p>DG:</p>
                            <p>Zaključak:</p>
                            <p>TH:</p>
                            <br><p style="text-align-last: right">Dr Bojan Vojnović, Angiolog</p>
                        </textarea>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary form-control">Sačuvaj</button>
                </form>
            </div>
        </div>
    </div>
<!-- Modal -->
    <div class="modal fade" id="nalazModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NALAZ</h5>
                </div>
                <div class="modal-body">
                {!! $content !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="closeModal">Zatvori</button>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {

    function initTinyMCE() {
        if (!window.tinymce) {
            console.warn('Tekst editor nije učitan');
            return;
        }

        tinymce.remove();

        tinymce.init({
            selector: '#nalaz',
            plugins: ['autosave', 'fullscreen'],
            menubar: false,
            toolbar: 'bold italic underline | alignleft aligncenter alignright alignjustify | resetbutton | fullscreen | printbutton',
            height: 600,
            branding: false,
            promotion: false,

            text_patterns: [
                { start: 'subkl', replacement: 'Subklavijalne, aksilarne, brahijalne, radijalne i ulnarne arterije i vene su bez promena.' },
                { start: 'ilijačne', replacement: 'Obostrano ilijačne, femoralne, poplitealne, zadnje i prednje tibijalne i peronealne vene su spontanog, fazičnog protoka, bez tromba i valvularne insuficijencije. Vv.mm.solei i gastrocnemii su bez promena.' },
                { start: 'v.cava', replacement: 'V.cava inferior je spontanog, fazičnog protoka, bez tromba.' },
                { start: 'karotidne', replacement: 'Obostrano karotidne arterije su odgovarajućih hemodinamskih i morfoloških osobina, bez patoloških promena. Vertebralne arterije su odgovarajućih promera, fiziološkog smera, suficijentnih brzina, bez značajnih promena pri rotacionim i ekstenzionim položajima vrata.' },
                { start: 'vertebralne', replacement: 'Vertebralne arterije su odgovarajućih promera, fiziološkog smera, suficijentnih brzina, bez značajnih promena pri rotacionim i ekstenzionim položajima vrata.' }
            ],

            setup: (editor) => {
                // Dugme za reset TinyMCE sadržaja
                let defaultContent;

                editor.on('init', () => {
                    defaultContent = editor.getContent(); // sačuvaj početni HTML
                });

                editor.ui.registry.addButton('resetbutton', {
                    text: 'RESETUJ',
                    icon: 'undo',
                    tooltip: 'Vrati na početni tekst',
                    onAction: () => {
                        editor.resetContent(defaultContent); // vrati na početni HTML
                        editor.save(); // sinhronizacija sa Livewire
                    }
                });
                // Dugme za štampu tinymce sadržaja
                editor.ui.registry.addButton('printbutton', {
                    text: 'ŠTAMPAJ IZVEŠTAJ',
                    icon: 'print',
                    tooltip: 'Pokreće štampu izveštaja',
                    onAction: () => {
                        const content = editor.getContent(); // samo sadržaj editora
                        const printWindow = window.open('', '_blank');
                        printWindow.document.open();
                        printWindow.document.write(`
                            <html>
                            <head>
                                <title>Štampa</title>
                            </head>
                            <body>
                                ${content}
                            </body>
                            </html>
                        `);
                        printWindow.document.close();
                        printWindow.focus();
                        printWindow.print();
                        printWindow.close();
                    }
                });

                // Ne gubi sadržaj sa ažuriranjem Livewire komponente
                editor.on('init change input undo redo', () => {
                    editor.save();
                });
            }
        });
    }

    // helpers za naziv pregleda i checkbox angiološki
    window.setContent = function (pregledNaziv) {
        const editor = tinymce.get('nalaz');
        if (editor) {
            const p = editor.dom.select('#nazivPregleda')[0];
            if (p) editor.dom.setHTML(p, pregledNaziv);
        }
    };

    window.updateCheckBox = function (opts) {
        document.querySelectorAll('[name="angioloski"]').forEach(chk => {
            chk.disabled = opts.value !== '1';
            if (opts.value !== '1') chk.checked = false;
        });
    };

    // otvaranje i zatvaranje modala
    const modalEl = document.getElementById('nalazModal');
    const bootstrapModal = modalEl ? new bootstrap.Modal(modalEl) : null;

    if (modalEl) {
        modalEl.addEventListener('shown.bs.modal', initTinyMCE);
        document.getElementById('closeModal')?.addEventListener('click', () => bootstrapModal?.hide());
    }

    window.addEventListener('open-nalaz-modal', () => bootstrapModal?.show());
    window.addEventListener('osvezi-tinymce', () => setTimeout(initTinyMCE, 50));

    if (window.Livewire) {
        Livewire.hook('message.processed', () => {
            if (!tinymce.get('nalaz')) initTinyMCE();
        });
    }

    document.getElementById('pregledForm')?.addEventListener('submit', () => {
        const editor = tinymce.get('nalaz');
        if (editor) @this.set('nalaz', editor.getContent());
    });

    initTinyMCE();
});
</script>
@endpush

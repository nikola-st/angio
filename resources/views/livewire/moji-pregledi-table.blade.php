<div>
    {{-- Modal za prikaz Word nalaza --}}
    @if($showModal)
        <div class="modal fade show d-block" tabindex="-1" role="dialog" style="background: rgba(0,0,0,0.5);">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">NALAZ</h5>
                        <button type="button" class="btn-close" wire:click="closeModal"></button>
                    </div>
                    <div class="modal-body">
                        {!! $content !!}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="closeModal">Zatvori</button>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container mt-4">
        <h4 class="mb-3">Moji pregledi</h4>

        @if ($pregledi->count())
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Datum</th>
                        <th>Pregled</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pregledi as $p)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($p->datum)->format('d.m.Y') }}</td>
                            <td>
                                <button wire:click="openModal({{ $p->idpregleda }})" class="btn btn-primary btn-sm">
                                    Pogledaj izveštaj
                                </button>
                                <button wire:click="downloadPDF({{ $p->idpregleda }})" class="btn btn-warning btn-sm">
                                    Preuzmi izveštaj PDF
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Nema pregleda za prikaz.</p>
        @endif
    </div>

{{-- Kontakt sekcija --}}
    <section id="contact" class="mt-5">
        <div class="container">
            <a href="tel:+381112436630" class="btn btn-success mb-4">Pozovite nas!</a>

            <form action="{{ route('contact.send') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <div class="col-md-6">
                        <input type="text" name="name" class="form-control" placeholder="Vaše ime" required>
                    </div>
                    <div class="col-md-6">
                        <input type="email" name="email" class="form-control" placeholder="Vaš email" required>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" name="subject" class="form-control" placeholder="Naslov" required>
                </div>
                <div class="mb-3">
                    <textarea name="message" rows="5" class="form-control" placeholder="Poruka" required></textarea>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif
                <button type="submit" class="btn btn-primary">Pošalji poruku</button>
            </form>
        </div>
    </section>
</div>

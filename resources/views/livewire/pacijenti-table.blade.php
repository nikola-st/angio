<div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('message'))
                    <h5 class="alert alert-success">{{ session('message') }}</h5>
                @endif

                <div class="card">
                    <div class="card-header">
                        <h4>svi pacijenti
                            <input type="search" wire:model.live="search" class="form-control float-end mx-2" placeholder="Traži po imenu i prezimenu..." style="width: 230px" />
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#pacijentModal">Prvi pregled</button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Ime i Prezime</th>
                                    <th>Godište</th>
                                    <th>Adresa</th>
                                    <th>Telefon</th>
                                    <th>Email</th>
                                    <th>Akcija</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($pacijenti as $pacijent)
                                    <tr>
                                        <td>{{ $pacijent->imeprezime }}</td>
                                        <td>{{ $pacijent->godina_rodjenja }}</td>
                                        <td>{{ $pacijent->adresa }}</td>
                                        <td>{{ $pacijent->telefon }}</td>
                                        <td>{{ $pacijent->email }}</td>
                                        <td>
                                            <a href="{{ route('pregledi', $pacijent->idpacijenta) }}">
                                                <button type="button" class="btn btn-success btn-sm">Kontr. Pregled</button>
                                            </a>
                                            <button class="btn btn-primary btn-sm" type="button"
                                                data-bs-toggle="modal" data-bs-target="#updatePacijentModal"
                                                wire:click="editPacijent({{ $pacijent->idpacijenta }})"
                                                wire:key="edit-{{ $pacijent->idpacijenta }}">Izmeni</button>
                                            <button type="button" class="btn btn-danger btn-sm"
                                                data-bs-toggle="modal" data-bs-target="#deletePacijentModal"
                                                wire:click="deletePacijent({{ $pacijent->idpacijenta }})"
                                                wire:key="delete-{{ $pacijent->idpacijenta }}">Obriši</button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Pacijenti nisu pronađeni!</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div>
                            {{ $pacijenti->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Insert Modal -->
    <div wire:ignore.self class="modal fade" id="pacijentModal" tabindex="-1" aria-labelledby="pacijentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="pacijentModalLabel">Kreiraj Pacijenta</h5>
                </div>
                <form wire:submit.prevent="savePacijent">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Ime i prezime</label>
                            <input type="text" wire:model="imeprezime" class="form-control">
                            @error('imeprezime') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Godište</label>
                            <input type="text" wire:model="godina_rodjenja" class="form-control">
                            @error('godina_rodjenja') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Adresa</label>
                            <input type="text" wire:model="adresa" class="form-control">
                            @error('adresa') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Telefon</label>
                            <input type="text" wire:model="telefon" class="form-control">
                            @error('telefon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sačuvaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Update Pacijent Modal -->
    <div wire:ignore.self class="modal fade" id="updatePacijentModal" tabindex="-1" aria-labelledby="updatePacijentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updatePacijentModalLabel">Ažuriraj Pacijenta</h5>
                </div>
                <form wire:submit.prevent="updatePacijent">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label>Ime i prezime</label>
                            <input type="text" wire:model="imeprezime" class="form-control">
                            @error('imeprezime') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Godište</label>
                            <input type="text" wire:model="godina_rodjenja" class="form-control">
                            @error('godina_rodjenja') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Adresa</label>
                            <input type="text" wire:model="adresa" class="form-control">
                            @error('adresa') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Telefon</label>
                            <input type="text" wire:model="telefon" class="form-control">
                            @error('telefon') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" wire:model="email" class="form-control">
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Ažuriraj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Pacijent Modal -->
    <div wire:ignore.self class="modal fade" id="deletePacijentModal" wire:ignore.self tabindex="-1" aria-labelledby="deletePacijentModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deletePacijentModalLabel">Obriši Pacijenta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form wire:submit.prevent="destroyPacijent">
                    <div class="modal-body">
                        <h4>Da li ste sigurni?</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Odustani</button>
                        <button type="submit" class="btn btn-primary">Da! Obriši</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

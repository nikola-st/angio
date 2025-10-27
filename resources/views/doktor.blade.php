@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <livewire:pacijenti-table />
</div>
@endsection

<script>
document.addEventListener('DOMContentLoaded', () => {
    // Funkcija za zatvaranje modal-a
    function closeModalById(id) {
        const modalEl = document.getElementById(id);
        if (!modalEl) return;

        // Dohvati postojeću instancu ili kreiraj novu
        let modal = bootstrap.Modal.getInstance(modalEl);
        if (!modal) {
            modal = new bootstrap.Modal(modalEl);
        }

        modal.hide();

        // Vraćanje fokusa na body radi accessibility
        document.body.focus();
    }

    // Livewire event za zatvaranje svih modal-a
    Livewire.on('close-modal', () => {
        ['pacijentModal', 'updatePacijentModal', 'deletePacijentModal'].forEach(closeModalById);
    });

    // Otvori Delete Modal
    Livewire.on('open-delete-modal', () => {
        closeModalById('deletePacijentModal');
    });
});
</script>

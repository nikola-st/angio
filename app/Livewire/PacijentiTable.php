<?php

namespace App\Livewire;

use App\Models\Pacijent;
use App\Models\User;
use App\Models\Role;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use App\Notifications\SetPassword;


class PacijentiTable extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $idpacijenta;
    public $imeprezime;
    public $godina_rodjenja;
    public $adresa;
    public $telefon;
    public $email;
    public $search = '';

    use WithPagination;

    protected function rules(): array
    {
        return [
            'imeprezime' => 'required|string',
            'godina_rodjenja' => 'required|integer|min:1900|max:' . date('Y'),
            'adresa' => 'required|string',
            'telefon' => 'required|string',
            'email' => 'nullable|email',
        ];
    }

    protected $messages = [
        'imeprezime.required' => 'Ime i prezime su obavezni',
        'godina_rodjenja.required' => 'Godina rođenja je obavezna',
        'godina_rodjenja.integer' => 'Godina rođenja mora biti broj',
        'godina_rodjenja.min' => 'Godina rođenja ne može biti manja od 1900.',
        'godina_rodjenja.max' => 'Godina rođenja ne može biti veća od trenutne godine.',
        'adresa.required' => 'Adresa je obavezna',
        'telefon.required' => 'Broj telefona je obavezan',
        'telefon.string' => 'Broj telefona mora biti tekstualni string',
        'email.email' => 'Format email adrese nije ispravan',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function savePacijent()
    {
        $validatedData = $this->validate();

        $pacijent = Pacijent::create($validatedData);

        if (!empty($pacijent->email)) {
            $user = User::create([
                'name' => $pacijent->imeprezime,
                'email' => $pacijent->email,
                'password' => Hash::make('angio1234'),
                'role_id' => Role::patientId(),
            ]);

            $pacijent->user_id = $user->id;
            $pacijent->save();

            $token = Password::createToken($pacijent);
            $pacijent->notify(new SetPassword($token));
        }

        $this->resetInput();
        $this->dispatch('close-modal');
        session()->flash('message', 'Pacijent dodat uspešno!');

        return redirect()->route('pregledi', $pacijent->idpacijenta);
    }

    public function editPacijent(int $idpacijenta)
    {
        $pacijent = Pacijent::find($idpacijenta);

        if ($pacijent) {
            $this->idpacijenta = $pacijent->idpacijenta;
            $this->imeprezime = $pacijent->imeprezime;
            $this->godina_rodjenja = $pacijent->godina_rodjenja;
            $this->adresa = $pacijent->adresa;
            $this->telefon = $pacijent->telefon;
            $this->email = $pacijent->email;
        } else {
            redirect()->to('/pacijent')->send();
        }
    }

    public function updatePacijent()
    {
        $validatedData = $this->validate();

        $pacijent = Pacijent::findOrFail($this->idpacijenta);
        $pacijent->update($validatedData);

        if (!empty($pacijent->email) && !$pacijent->user_id) {
            $user = User::create([
                'name' => $pacijent->imeprezime,
                'email' => $pacijent->email,
                'password' => Hash::make('angio1234'),
                'role_id' => Role::patientId(),
            ]);

            $pacijent->user_id = $user->id;
            $pacijent->save();

            $token = Password::createToken($pacijent);
            $pacijent->notify(new SetPassword($token));
        }

        $this->resetInput();
        $this->dispatch('close-modal');
        session()->flash('message', 'Pacijent uspešno ažuriran!');
    }

    public function deletePacijent(int $idpacijenta)
    {
        $this->idpacijenta = $idpacijenta;
        $this->dispatch('open-delete-modal');
    }

    public function destroyPacijent()
    {
        Pacijent::findOrFail($this->idpacijenta)->delete();
        $this->dispatch('close-modal');
        session()->flash('message', 'Pacijent uspešno obrisan!');
    }

    private function resetInput()
    {
        $this->idpacijenta = null;
        $this->imeprezime = '';
        $this->godina_rodjenja = '';
        $this->adresa = '';
        $this->telefon = '';
        $this->email = '';
    }

    public function render()
    {
        $pacijenti = Pacijent::where('imeprezime', 'like', '%' . $this->search . '%')
            ->orderBy('idpacijenta', 'desc')
            ->paginate(10);

        return view('livewire.pacijenti-table', [
            'pacijenti' => $pacijenti,
        ]);
    }
}

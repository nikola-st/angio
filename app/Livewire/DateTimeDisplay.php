<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class DateTimeDisplay extends Component
{
    public $dateTime;

    public function mount()
    {
        // Postavljanje lokalne vremenske zone i srpskog jezika
        date_default_timezone_set('Europe/Belgrade');
        Carbon::setLocale('sr');
        $this->updateDateTime();
    }

    public function updateDateTime()
    {
        // Prikaz dana na srpskom, datum i vreme
        $this->dateTime = Carbon::now()->translatedFormat('l, d.m.Y H:i');
    }

    public function render()
    {
        return view('livewire.date-time-display');
    }
}

<?php

namespace App\Providers;

use App\Livewire\MojiPreglediTable;
use Illuminate\Support\ServiceProvider;

use Livewire\Livewire;
use App\Livewire\DateTimeDisplay;
use App\Livewire\PacijentiTable;
use App\Livewire\PreglediTable;
use App\Models\Pregled;
use App\Models\Pacijent;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
      //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Livewire::component('date-time-display', DateTimeDisplay::class);
        Livewire::component(name: 'pacijenti-table', class: PacijentiTable::class);
        Livewire::component('pregledi-table', class: PreglediTable::class);
        Livewire::component('moji-pregledi-table', class: MojiPreglediTable::class);

        // Globalne promenljive za broj pacijenata i pregleda u bazi
        view()->composer('*', function ($view) {
            $view->with('pacijentCount', Pacijent::count());
            $view->with('pregledCount', Pregled::count());
        });
    }
}

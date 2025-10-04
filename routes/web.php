<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Middleware\PatientMiddleware;

// Default home (ćirilica)
Route::get('/', function () {
    return view('medialab.sr_cir', [
        'pregledCount' => \App\Models\Pregled::count(),
        'pacijentCount' => \App\Models\Pacijent::count(),
    ]);
})->name('home');

// Latinica
Route::get('/lat', function () {
    return view('medialab.sr_lat', [
        'pregledCount' => \App\Models\Pregled::count(),
        'pacijentCount' => \App\Models\Pacijent::count(),
    ]);
})->name('home.lat');

// Engleski
Route::get('/en', function () {
    return view('medialab.en', [
        'pregledCount' => \App\Models\Pregled::count(),
        'pacijentCount' => \App\Models\Pacijent::count(),
    ]);
})->name('home.en');

// Kontakt forma
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

// Authenticated routes (Breeze)
Route::middleware('auth')->group(function () {

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Doktor dashboard
    Route::get('/doktor', [DashboardController::class, 'doktor'])
        ->name('doktor')
        ->middleware(DoctorMiddleware::class);

    // Stranica pregleda pacijenta (doktor)
    Route::get('/pregledi/{idpacijenta}', [DashboardController::class, 'pregledi'])
        ->name('pregledi')
        ->middleware(DoctorMiddleware::class);

    // Pacijent dashboard
    Route::get('/moji-pregledi/', [DashboardController::class, 'mojiPregledi'])
        ->name('moji-pregledi')

        ->middleware(PatientMiddleware::class);
});

require __DIR__ . '/auth.php';

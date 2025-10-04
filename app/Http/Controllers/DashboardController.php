<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Dashboard za doktora
    public function doktor()
    {
        return view('doktor');
    }

    // Pregled pacijenta (doktor)
    public function pregledi($idpacijenta)
    {
        return view('pregledi', compact('idpacijenta'));
    }

    //Dashboard za pacijenta
    public function mojiPregledi()
    {
        return view('moji-pregledi');
    }
}

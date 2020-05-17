<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class privacitatController extends Controller
{
    // Mostrar LA POLÍTICA DE PRIVACITAT:
    public function index(Request $request)
    {
        return view('privacitat_termes.privacitat');
    }

    // Mostrar Avís legal i termes d'ús:
    public function termes(Request $request)
    {
        return view('privacitat_termes.termes');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class privacitatController extends Controller
{
    public function index(Request $request)
    {
        //$request->USER()->authorizeRoles('professor');
        return view('privacitat_termes.privacitat');
    }

    public function termes(Request $request)
    {
        //$request->USER()->authorizeRoles('professor');
        return view('privacitat_termes.termes');
    }
}

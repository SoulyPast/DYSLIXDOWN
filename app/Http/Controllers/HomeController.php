<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    // Mostrar el Home.
    public function index(Request $request)
    {
        return view('home');
    }

    // Comprovar si l'usuari si aquesta loguejat per anar a activitats sinó a login.
    public function getHome()
    {
        if (Auth::check()){
            return redirect('/activitats');
        }else{
            return redirect('/login');
        }

    }
}

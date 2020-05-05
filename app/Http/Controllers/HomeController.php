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
    public function index(Request $request)
    {
        //$request->USER()->authorizeRoles('professor');
        return view('home');
    }

    public function prueba(Request $request)
    {
        $request->USER()->authorizeRoles('professor');
        return view('prueba');
    }

    public function getHome()
    {

        if (Auth::check()){
            return redirect('/activitats');
        }else{
            return redirect('/login');
        }

    }
}

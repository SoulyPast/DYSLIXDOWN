<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Activitat;
class activitats extends Controller
{
    public function index()
    {
        //mostrar activitats
        $activitas=Activitat::all();
        return view('activitats.index', array( 'activitas' => $activitas));
    }

    public function getShow($id){
        $activitas=Activitat::findOrFail($id);
        //$reviews=Reviews::all()->where('movie_id','=',$id);
        return view('activitats.show',array('activitas' => $activitas));

    }

    public function postCreate(Request $request)
    {
        $request->USER()->authorizeRoles('professor');
        return view('activitats.create');
    }
}

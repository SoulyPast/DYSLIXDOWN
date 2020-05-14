<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Valoracio;
use App\Resultat;
use DB;
use App\Exercici;
class valoracions extends Controller
{
    public function postajax( Request $data ){
        Valoracio::create([
             'stars' => $data['stars'],
             'user_id' => $data['user_id'],
             'activitat_id' => $data['activitat_id']
             ]);

         return response()->json(['success'=>'perfect']);

     }


     public function index( Request $data ){

            $valoracio=Valoracio::Select('activitat_id',DB::raw('AVG(stars) as quantity'))->groupBy('activitat_id')->get();
            return view('resultat.index', array( 'valoracio' => $valoracio));

     }

     public function show( Request $data, $id){
        $resultats=Resultat::all()->where('activitat_id','=',$id);
        $respostes=Exercici::Select('resposta')->where('activitat_id','=',$id);

        return view('resultat.show', array( 'resultats' => $resultats), array( 'respostes' => $respostes));

 }
}

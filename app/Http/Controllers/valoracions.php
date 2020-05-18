<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Valoracion;
use App\Resultat;
use App\Activitat;
use DB;
use App\Exercici;
class valoracions extends Controller
{
    // Guarda valoracions del usuari
    public function postajax( Request $data ){
        Valoracion::create([
             'stars' => $data['stars'],
             'user_id' => $data['user_id'],
             'activitat_id' => $data['activitat_id']
             ]);

         return response()->json(['success'=>'perfect']);

     }

     // mostrar les activitats depend de cada professor més avg de stars.
     public function index( Request $data ){

            $valoracio=Valoracion::Select('activitat_id',DB::raw('AVG(stars) as quantity'))
            ->leftJoin('activitats','valoracions.activitat_id','=','activitats.id')
            ->where('activitats.user_id','=',Auth::user()->id)->groupBy('valoracions.activitat_id')->get();
            return view('resultat.index', array( 'valoracio' => $valoracio));
     }

     // mostrar resultats d'activitats
     public function show( Request $data, $id){
        $resultats= Resultat::all()->where('activitat_id','=',$id);
        $respostes = Exercici::select('resposta')->where('activitat_id','=',$id)->get();;
        $fallos;
        return view('resultat.show', array( 'resultats' => $resultats), array( 'respostes' => $respostes));
    }

    // mostrar play
    public function play( Request $data){
        return view('play.index');
    }

    //Busca el codi de l'activitat.
    public function code( Request $data, $code){
        $Activitat= Activitat::all()->where('codi','=',$code);
        return  response()->json(array('Activitat' => $Activitat), 200);
    }
}

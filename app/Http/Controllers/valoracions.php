<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Valoracio;
use App\Resultat;
use App\Activitat;
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

            $valoracio=Valoracio::Select('activitat_id',DB::raw('AVG(stars) as quantity'))
            ->leftJoin('activitats','valoracios.activitat_id','=','activitats.id')
            ->where('activitats.user_id','=',Auth::user()->id)->groupBy('valoracios.activitat_id')->get();
            return view('resultat.index', array( 'valoracio' => $valoracio));
     }

     public function show( Request $data, $id){
        $resultats= Resultat::all()->where('activitat_id','=',$id);
        $respostes = Exercici::select('resposta')->where('activitat_id','=',$id)->get();;
        $fallos;
        return view('resultat.show', array( 'resultats' => $resultats), array( 'respostes' => $respostes));
    }

    public function play( Request $data){
        return view('play.index');
    }

    public function code( Request $data, $code){
        $Activitat= Activitat::all()->where('codi','=',$code);
        return  response()->json(array('Activitat' => $Activitat), 200);
    }
}

<?php

namespace App\Http\Controllers;
use App\User;
use App\Activitat;
use App\Tipus;
use App\Nivell;
use App\Exercici;
use App\Resultat;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class activitats extends Controller
{
    public function index()
    {
        //mostrar activitats
        $activitas=Activitat::all()->where('public','=',true)->where('acabat','=',true);
        return view('activitats.index', array( 'activitas' => $activitas));
    }

    // mostra una activitat per id
    public function getShow($id){
        $activitas=Activitat::findOrFail($id);
        $exercici=Exercici::all()->where('activitat_id','=',$id);
        if($activitas->tipus_id==1){
        return view('activitats1.show',array('activitas' => $activitas),array('exercici' => $exercici));
        }
        else{
        return view('activitats2.show',array('activitas' => $activitas),array('exercici' => $exercici));
        }
    }

    public function getShowajax($id){
        $exercici=Exercici::all()->where('activitat_id','=',$id);
        return  response()->json(array('exercici' => $exercici), 200);
    }

    public function getCreate(Request $request){
        $request->USER()->authorizeRoles('professor');
        $Tipus=Tipus::all();
        $Nivells=Nivell::all();
        return view('activitats.create',array( 'Tipus' => $Tipus),array( 'Nivells' => $Nivells));
    }
    //Crea Activitat
    public function postCreate(Request $data)
    {
        $data->USER()->authorizeRoles('professor');
        $Tipus=Tipus::where('nom_tipus','=',$data['tipus'])->pluck('id');
        $Nivells=Nivell::where('nom_nivell','=',$data['nivell'])->pluck('id');
        $ESTAT = true;
        if($data['estat']=='Public'){
            $ESTAT=true;
        }
        else{
            $ESTAT=false;
        }
        $now = new DateTime();
        Activitat::create([
            'nom_activitat' => $data['nom'],
            'descripcio_activiatat' => $data['descripcio'],
            'tipus_id' => $Tipus[0],
            'nivell_id' =>$Nivells[0],
            'user_id' => Auth::user()->id,
            'codi' => $now->getTimestamp(),
            'public' => $ESTAT
            ]);

            return redirect('/LesMevesActivitats');
    }


    public function getshowactivitats(Request $data){
        $data->USER()->authorizeRoles('professor');
        $activitas=Activitat::all()->where('user_id','=',Auth::user()->id);
        return view('activitats.LesMevesActivitats', array( 'activitas' => $activitas));
    }


    public function deleteActivitats($id, Request $data)
    {
        $data->USER()->authorizeRoles('professor');
        $activitats=Activitat::findOrFail($id);
            $activitats->delete();
            return redirect('/LesMevesActivitats');
    }

    public function getshowactivitat($id, Request $data){
        $data->USER()->authorizeRoles('professor');
        $activitat=Activitat::findOrFail($id);
        return view('activitats.showActivitat',array('activitat' => $activitat));
    }


    public function getEdit($id, Request $data){
        $data->USER()->authorizeRoles('professor');
        $activitat=Activitat::findOrFail($id);
        return view('activitats.edita',array('activitat' => $activitat));
    }

    public function putEdit($id ,Request $request){
        $request->USER()->authorizeRoles('professor');
        $ESTAT = true;
        if($request->input('estat')==='Public'){
            $ESTAT = true;
        }
        else{
            $ESTAT = false;
        }
        $activitat=Activitat::findOrFail($id);
            $activitat->nom_activitat = $request->input('nom');
            $activitat->descripcio_activiatat = $request->input('descripcio');
            $activitat->tipus_id = $request->input('tipus');
            $activitat->nivell_id = $request->input('nivell');
            $activitat->codi = $request->input('codi');
            $activitat->user_id = Auth::user()->id;
            $activitat->public =  $ESTAT;
            $activitat->save();
            return redirect()->to('/activitats/showActivitat/'.$id);

    }

    public function postajax( Request $data ){
       Resultat::create([
            'puntuacio' => $data['puntuacio'],
            'user_id' => $data['user_id'],
            'activitat_id' => $data['activitat_id'],
            'eroors' => $data['eroors']
            ]);

        return response()->json(['success'=>$data['eroors']]);

    }

}

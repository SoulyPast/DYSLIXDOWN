<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;
use App\Activitat;
use App\Tipus;
use App\Nivell;
use App\Exercici;
use App\Resultat;
use App\Rang;
use DateTime;
use DB;
class ActivitatController extends Controller
{
    // Mostra totes les activitats que estan públiques i acabades.
    public function index()
    {
        $activitats=Activitat::all()->where('public','=',true)->where('acabat','=',true);
        return view('activitats.index', array( 'activitats' => $activitats));
    }

    // Mostrar activitat per codi también retornar els exercicis relacionat amb aquesta activitat.
    public function getShow($codi){
        $activitats = Activitat::wherecodi($codi)->first();
        $exercici=Exercici::all()->where('activitat_id','=',$activitats->id);
        return view('Activitats1-2.show',array('activitats' => $activitats),array('exercici' => $exercici));

    }

    // Mostrar el formulari amb els tipus d'activitats i nivells diponibles.
    public function getCreate(Request $request){
        $request->USER()->authorizeRoles('professor');
        $Tipus=Tipus::all();
        $Nivells=Nivell::all();
        return view('activitats.create',array( 'Tipus' => $Tipus),array( 'Nivells' => $Nivells));
    }

    // Crea una Activitat Nova .
    public function postCreate(Request $data)
    {
        $data->USER()->authorizeRoles('professor');
        $Tipus=Tipus::where('nom_tipus','=',$data['tipus'])->pluck('id');
        $Nivells=Nivell::where('nom_nivell','=',$data['nivell'])->pluck('id');
        $ESTAT = true;
        if($data['estat']=='Public'){$ESTAT=true;}
        else{$ESTAT=false;}
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

    // Mostra totes les activitats que ha creat un usuari tipo professional.
    public function getshowactivitats(Request $data){
        $data->USER()->authorizeRoles('professor');
        $activitats=Activitat::all()->where('user_id','=',Auth::user()->id);
        return view('activitats.LesMevesActivitats', array( 'activitats' => $activitats));
    }


    // Accedir a una activitat concreta que ha creat un usuari tipo professional.
    public function getshowactivitat($id, Request $data){
        $data->USER()->authorizeRoles('professor');
        $activitat=Activitat::findOrFail($id);
        return view('activitats.showActivitat',array('activitat' => $activitat));
    }

    // Mostrar el formulario de Editar a una activitat.
    public function getEdit($id, Request $data){
        $data->USER()->authorizeRoles('professor');
        $activitat=Activitat::findOrFail($id);
        return view('activitats.edita',array('activitat' => $activitat));
    }

    // Editar a una activitat concreta que ha creat un usuari tipo professional.
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


    /***************************
     *  AJAX
     ***************************/

     // Ajax Get: mostrar exercicis de una activitat buscan per id de activitat.
    public function getShowajax($id){
        $exercici=Exercici::all()->where('activitat_id','=',$id);
        return  response()->json(array('exercici' => $exercici), 200);
    }

    // Ajax Delete: Borrar una activitat.
    public function deleteActivitats($id, Request $data)
    {
        $data->USER()->authorizeRoles('professor');
        $activitats=Activitat::findOrFail($id);
        $activitats->delete();
        return true;
    }

    // Ajax Post: Guardar la puntacio del usuari normal despres de fer l'activitat.
    public function postajax( Request $data ){
       Resultat::create([
            'puntuacio' => $data['puntuacio'],
            'user_id' => $data['user_id'],
            'activitat_id' => $data['activitat_id'],
            'eroors' => $data['eroors']
            ]);
        return response()->json(['success'=>'be']);
    }

    public function PutNivellAjax( Request $data ){

        $data->USER()->authorizeRoles('alumne');
         $Exp=0;
         if($data['puntuacio']==3){
             $EXP=30;
         }
         else if($data['puntuacio']==2){
             $EXP=20;
         }
         else{
             $EXP=10;
         }
         $user=User::findOrFail(Auth::user()->id);
         $Experencia = $user->Exp + $EXP;
         $Nivell =  substr($Experencia, 0, -2);

         $user->update(['Exp' => $Experencia,'Nivell' => $Nivell]);
         return response()->json(['success'=>'be']);
     }



}

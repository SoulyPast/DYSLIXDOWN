<?php

namespace App\Http\Controllers;
use App\Activitat;
use App\Exercici;
use Illuminate\Http\Request;

class exercicis extends Controller
{
    // Mostrar els exercicis per id de activitat
    public function getShow($id){
        $activitats=Activitat::findOrFail($id);
        $Exercicis = Exercici::all()->where('activitat_id','=',$id);
        if( $activitats->tipus_id == 1){
        return view('exercici.show1Exercicis',array('activitats' => $activitats),array('Exercicis' => $Exercicis));}
        else{
        return view('exercici.show2Exercicis',array('activitats' => $activitats),array('Exercicis' => $Exercicis));
        }
    }

    // Crear un exercici (Tipus: Formant paraules)
    public function postcreate(Request $data ,$id){
        Exercici::create([
            'activitat_id' => $id,
            'resposta' => $data['paraula'],
            ]);

         return redirect()->to('/activitat/show1Exercicis/'.$id);
    }

    // Borrar un exercici.
    public function deletexercici($id ,Request $data)
    {
            $exercici=Exercici::findOrFail($id );
            $exercici->delete();
            $exeactivitat = Exercici::all()->where('activitat_id','=',$data['id_activitat'])->count();
            if($exeactivitat<5){
                $activitat=Activitat::findOrFail($data['id_activitat']);
                $activitat->update(['acabat' => false]);
            }
            return redirect()->to('/activitat/show1Exercicis/'.$data['id_activitat']);

    }

    // Edita un exercici (Tipus: Formant paraules)
    public function putexercici($id ,Request $data)
    {
            $exercici=Exercici::findOrFail($id );
            $exercici->activitat_id = $data->input('id_activitat');
            $exercici->resposta =  $data->input('paraula');
            $exercici->save();
            return redirect()->to('/activitat/show1Exercicis/'.$data['id_activitat']);
    }

    // canviar l'estat de activitat activa
    public function putAcabat($id){
        $activitat=Activitat::findOrFail($id);
        $activitat->update(['acabat' => true]);
        return redirect()->to('/activitats/showActivitat/'.$id);
    }

    // canviar l'estat de activitat en procés
    public function putNoAcabat($id)
    {
        $activitat=Activitat::findOrFail($id);
        $activitat->update(['acabat' => false]);
        return redirect()->to('/activitats/showActivitat/'.$id);
    }


}

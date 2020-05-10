<?php

namespace App\Http\Controllers;
use App\Activitat;
use App\Exercici;
use Illuminate\Http\Request;

class exercicis extends Controller
{
    public function getShow($id){
        $activitats=Activitat::findOrFail($id);
        $Exercicis = Exercici::all()->where('activitat_id','=',$id);
        return view('exercici.show1Exercicis',array('activitats' => $activitats),array('Exercicis' => $Exercicis));
    }

    public function postcreate(Request $data ,$id){
        Exercici::create([
            'activitat_id' => $id,
            'resposta' => $data['paraula'],
            ]);

         return redirect()->to('/activitat/show1Exercicis/'.$id);
    }

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

    public function putexercici($id ,Request $data)
    {
            $exercici=Exercici::findOrFail($id );
            $exercici->activitat_id = $data->input('id_activitat');
            $exercici->resposta =  $data->input('paraula');
            $exercici->save();
            return redirect()->to('/activitat/show1Exercicis/'.$data['id_activitat']);
    }

    public function putRent($id){
        $activitat=Activitat::findOrFail($id);
        $activitat->update(['acabat' => true]);
        return redirect()->to('/activitats/showActivitat/'.$id);
    }

    public function putReturn($id)
    {
        $activitat=Activitat::findOrFail($id);
        $activitat->update(['acabat' => false]);
        return redirect()->to('/activitats/showActivitat/'.$id);
    }


}

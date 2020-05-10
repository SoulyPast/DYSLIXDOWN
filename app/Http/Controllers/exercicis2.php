<?php

namespace App\Http\Controllers;
use App\Activitat;
use App\Exercici;
use Illuminate\Http\Request;

class exercicis2 extends Controller
{
    public function getShow($id){
        $activitats=Activitat::findOrFail($id);
        $Exercicis = Exercici::all()->where('activitat_id','=',$id);
        return view('exercici.show2Exercicis',array('activitats' => $activitats),array('Exercicis' => $Exercicis));
    }

    public function postcreate(Request $data ,$id){
        $activitats=Activitat::findOrFail($id);
        if($activitats->nivell_id==1){
        Exercici::create([
            'activitat_id' => $id,
            'resposta' => $data['opcio1'],
            'opcio1' => $data['opcio2'],
            'opcio2' => $data['opcio3'],
            'opcio3' => $data['opcio4'],
            ]);
        }

        else if($activitats->nivell_id==2){
            Exercici::create([
                'activitat_id' => $id,
                'resposta' => $data['opcio1'],
                'opcio1' => $data['opcio2'],
                'opcio2' => $data['opcio3'],
                'opcio3' => $data['opcio4'],
                'opcio4' => $data['opcio5'],
                'opcio5' => $data['opcio6']
                ]);
            }

        else{
            Exercici::create([
                'activitat_id' => $id,
                'resposta' => $data['opcio1'],
                'opcio1' => $data['opcio2'],
                'opcio2' => $data['opcio3'],
                'opcio3' => $data['opcio4'],
                'opcio4' => $data['opcio5'],
                'opcio5' => $data['opcio6'],
                'opcio6' => $data['opcio7'],
                'opcio7' => $data['opcio8'],
                ]);
        }

         return redirect()->to('/activitat/show2Exercicis/'.$id);
        }

        public function putexercici($id ,Request $data)
        {
        $activitats=Activitat::findOrFail($data->input('id_activitat'));
        if($activitats->nivell_id==1){
                $exercici=Exercici::findOrFail($id );
                $exercici->activitat_id = $data->input('id_activitat');
                $exercici->resposta =  $data->input('opcio1');
                $exercici->opcio1 =  $data->input('opcio2');
                $exercici->opcio2 =  $data->input('opcio3');
                $exercici->opcio3 =  $data->input('opcio4');
                $exercici->save();
        }
        else if($activitats->nivell_id==2){
            $exercici=Exercici::findOrFail($id);
            $exercici->activitat_id = $data->input('id_activitat');
            $exercici->resposta =  $data->input('opcio1');
            $exercici->opcio1 =  $data->input('opcio2');
            $exercici->opcio2 =  $data->input('opcio3');
            $exercici->opcio3 =  $data->input('opcio4');
            $exercici->opcio4 =  $data->input('opcio5');
            $exercici->opcio5 =  $data->input('opcio6');
            $exercici->save();
        }
        else{
            $exercici=Exercici::findOrFail($id);
            $exercici->activitat_id = $data->input('id_activitat');
            $exercici->resposta =  $data->input('opcio1');
            $exercici->opcio1 =  $data->input('opcio2');
            $exercici->opcio2 =  $data->input('opcio3');
            $exercici->opcio3 =  $data->input('opcio4');
            $exercici->opcio4 =  $data->input('opcio5');
            $exercici->opcio5 =  $data->input('opcio6');
            $exercici->opcio6 =  $data->input('opcio7');
            $exercici->opcio7 =  $data->input('opcio8');
            $exercici->save();
        }
        return redirect()->to('/activitat/show2Exercicis/'.$data['id_activitat']);
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
            return redirect()->to('/activitat/show2Exercicis/'.$data['id_activitat']);

    }


}

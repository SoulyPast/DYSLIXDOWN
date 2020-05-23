<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    // Mostrar El perfil
    public function index(Request $request)
    {
        return view('perfil');
    }

    // Mostrar el formulario de esitar el perfil.
    public function editperfil(Request $request){

        return view('editPerfil');
    }

    //Modificacio del perfi.
    public function update(Request $request){
        if(Hash::check($request->password, Auth::user()->password)){
            $user=User::findOrFail(Auth::user()->id);
            $user->name =  $request['name'];
            $user->email =  $request['email'];
            $user->password =  Hash::make($request['password']);
            $user->escola =  $request['escola'];
            $user->save();

        return redirect('/perfil');
        }
        else{
            return redirect('/editPerfil');
        }

    }

    // Mostrar el formulario de editar la contrasenya de usuari .
    public function showcontrasenya(Request $request)
    {
        return view('/editacontrasenya');
    }

    // Modificacio de la constrasenya.
     public function editacontrasenya(Request $request)
    {
        if(Hash::check($request->passwordanti, Auth::user()->password)){
            $user=User::findOrFail(Auth::user()->id);
            $user->name =  Auth::user()->name;
            $user->email =  Auth::user()->email;
            $user->password =  Hash::make($request['password']);
            $user->escola =  Auth::user()->escola;
            $user->save();

        return redirect('/perfil');
        }
        else{
            return redirect('/editacontrasenya');
        }
    }

}

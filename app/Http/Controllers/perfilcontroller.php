<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class perfilcontroller extends Controller
{
    public function index(Request $request)
    {
        return view('perfil');
    }

    public function editperfil(Request $request){
        return view('editperfil');
    }

    public function update(Request $request){
        //Modificacio del usuari actual
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

    public function showcontrasenya(Request $request)
    {
        return view('/editacontrasenya');
    }

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

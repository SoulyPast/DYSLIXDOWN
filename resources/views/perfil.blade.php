@extends('layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> Benvingut al perfil de {{ Auth::user()->name }} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Nom: {{ Auth::user()->name }}<br></br>
                    Email: {{ Auth::user()->email }}<br></br>
                    @if(Auth::user()->hasRole('professor'))
                    Tipus d'usuari: Professor <br></br>
                    @endif
                    @if(Auth::user()->hasRole('alumne'))
                    Tipus d'usuari: Alumne <br></br>
                    @endif
                    Escola: {{ Auth::user()->escola }}
                    <div class="mt-5 text-center">
                    <a href="http://localhost:8000/editPerfil" class="btn btn-primary">Modifica el teu perfil</a>
                    <a href="http://localhost:8000/editacontrasenya" class="btn btn-secondary">Modifica la teva contrasenya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

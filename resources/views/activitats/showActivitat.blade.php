@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> <h1> {{$activitat->nom_activitat}} </h1> </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <strong>Descripció : </strong>{{ $activitat->descripcio_activiatat }}<br></br>
                    @if($activitat->public)
                    <a> <strong>Privacitat de l'activitat:</strong> Pública (La poden veure els alumnes i els professors)</a>
                    @else
                    <a> <strong>Privacitat de l'activitat:</strong> Privada (Només es pot accedir amb codi)</a>
                    @endif
                    <br></br>
                    @if($activitat->acabat)
                    <a> <strong>Estat :</strong> Acabada </a>
                    @else
                    <a> <strong>Estat :</strong> En procés</a>
                    @endif
                    <br></br>
                    <strong>Tipus :</strong>   {{ $activitat->tipus->nom_tipus }} <br></br>
                    <strong>Descripció de Tipus :</strong>  {{ $activitat->tipus->descripcio_tipus }} <br></br>
                    <strong>Nivell :</strong>  {{ $activitat->nivell->nom_nivell }} <br></br>
                    <strong>Descripció de Nivel :</strong>  {{ $activitat->nivell->descripcio_nivell }} <br></br>
                    @if(!$activitat->public)
                    <a> <strong>Code :</strong> {{$activitat->codi}} </a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

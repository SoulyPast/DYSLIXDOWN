@extends('layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"> {{$activitat->nom_activitat}} </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Descripcio : {{ $activitat->descripcio_activiatat }}<br></br>
                    @if($activitat->public)
                    <a> Public : Si </a>
                    @else
                    <a> Public : No</a>
                    @endif
                    <br></br>
                    @if($activitat->acabat)
                    <a> Acabat : Si </a>
                    @else
                    <a> Acabat : No</a>
                    @endif
                    <br></br>
                    Tipus :   {{ $activitat->tipus->nom_tipus }} <br></br>
                    Nivell :  {{ $activitat->nivell->nom_nivell }} <br></br>
                    @if(!$activitat->public)
                    <a> Code : {{$activitat->codi}} </a>
                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

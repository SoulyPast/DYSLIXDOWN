@extends('layouts.master')
@section('content')
<div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" class="form-control" placeholder="Cercar">
  </div>
<br>
<div class="text-center">
<img src="http://127.0.0.1:8000/Imatges/Portada/ABC.jpg" class="img-fluid" alt="Responsive image">
</div>
<br></br>
<div class="row" class="text-center">

        @foreach( $activitas as $key => $activitat )
            <div class="col-xs-6 col-sm-4 col-md-4 text-center">

                    <div class="card" style="margin:5px 0 10px 0;">
                    <img src="http://127.0.0.1:8000/Imatges/Logo/Logo.png" class="card-img-top" style="width:200px;height:80px;margin-left:20%">
                    <div class="card-body">
                        <h5 class="card-title">{{$activitat->nom_activitat}}</h5>
                        <p class="card-text">Tipus: {{$activitat->categoria_activiatat}}</p>
                        <p class="card-text">Nivell: {{$activitat->nivell_activitat}}</p>
                        <a href="{{ url('/activitats/show/'.$activitat->id) }}" class="btn btn-primary">Comença</a>
                    </div>
                    </div>


            </div>
        @endforeach
    </div>

@endsection

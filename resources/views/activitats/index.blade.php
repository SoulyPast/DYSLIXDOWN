@extends('layouts.master')
@section('content')
<div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" class="form-control" placeholder="Cercar" id="myInput" onkeyup="myFunction()">
  </div>

<div class="row" class="text-center">


         <div class="col-xs-6 col-sm-4 col-md-4 text-center">
         <ul id="myUL" class="lista pater" style="padding-right: 0px;
   padding-left: 0px;
   padding-bottom: 0px;
   padding-top: 0px;
   margin: 0px;">
         @foreach( $activitas as $key => $activitat )
         <li style="list-style:none;">
                    <div class="card" style="margin:5px 0 10px 0;">
                    <img src="http://127.0.0.1:8000/Imatges/Logo/Logo.png" class="card-img-top" style="width:200px;height:80px;margin-left:20%">
                    <div class="card-body">
                        <h5 class="card-title">{{$activitat->nom_activitat}}</h5>
                        <p class="card-text">Tipus: {{$activitat->tipus->nom_tipus}}</p>
                        <p class="card-text">Nivell: {{$activitat->nivell->nom_nivell}}</p>
                        <p class="card-text">Escola: {{Auth::user()->escola}}</p>
                        <p class="card-text"style="display:none"><a>{{$activitat->nom_activitat}} {{Auth::user()->escola}}</a></p>
                        @if($activitat->tipus_id==1)
                            <a href="{{ url('/activitats/show/'.$activitat->id) }}" class="btn btn-primary">Comença</a>
                        @else
                            <a href="{{ url('/activitats2/show/'.$activitat->id) }}" class="btn btn-primary">Comença</a>
                        @endif

                    </div>
                    </div>
        </li>
        @endforeach
        </ul>
        </div>

</div>

@endsection
@section('scripts')
<script src="{{ asset('Script/activitat.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection

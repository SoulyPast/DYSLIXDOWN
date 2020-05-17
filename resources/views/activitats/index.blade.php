@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">

<div class="form-group has-search">
    <span class="fa fa-search form-control-feedback"></span>
    <input type="text" class="form-control" placeholder="Cercar" id="myInput" onkeyup="SearchBar()">
  </div>

<div class="row" class="center">
    <div class="ml-3">
         <ul id="myUL" class="lista pater">
         @foreach( $activitats as $key => $activitat )
         <li class="linone mr-2 ml-2">
                    <div class="card" >
                    <img src="{{ asset('Imatges/Logo/Logo.png') }} " class="card-img-top" >
                    <div class="card-body">
                        <h5 class="card-title">{{$activitat->nom_activitat}}</h5>
                        <p class="card-text">Tipus: {{$activitat->tipus->nom_tipus}}</p>
                        <p class="card-text">Nivell: {{$activitat->nivell->nom_nivell}}</p>
                        <p class="card-text">Escola: {{Auth::user()->escola}}</p>
                        <p class="card-text"style="display:none"><a>{{$activitat->nom_activitat}} {{Auth::user()->escola}}</a></p>
                        @if($activitat->tipus_id==1)
                            <a href="{{ url('/activitats1/show/'.$activitat->codi) }}" class="btn btn-primary">Comença</a>
                        @else
                            <a href="{{ url('/activitats2/show/'.$activitat->codi) }}" class="btn btn-primary">Comença</a>
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
<script src="{{ asset('Script/SearchBar.js') }}" defer></script>
@endsection

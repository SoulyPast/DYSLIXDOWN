@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">

<div class="form-group has-search">

    <input type="text" class="form-control" placeholder="Cercar " id="myInput" onkeyup="SearchBar()">
  </div>

<div class="row" class="center">
    <div class="ml-3">
         <ul id="myUL" class="lista pater">
         @foreach( $activitats as $key => $activitat )
         <li class="linone mr-3 ml-2">
                    <div class="card" style="width: 18rem;">
                    <img src="{{ asset('Imatges/Logo/Logo.png') }} " class="card-img-top" >
                    <div class="card-body">
                    <a>
                        <h5 class="card-title">{{$activitat->nom_activitat}}</h5>
                        <p class="card-text">{{$activitat->tipus->nom_tipus}}</p>
                        <p class="card-text">Nivell: {{$activitat->nivell->nom_nivell}}</p>
                        <p class="card-text">Escola: {{$activitat->user->escola}}</p>
                    <a>
                        @if($activitat->tipus_id==1)
                            <a href="{{ url('/activitats1/show/'.$activitat->codi) }}" class="btn btn-primary mt-1"><i class="fa fa-child"></i> Comença</a>
                        @else
                            <a href="{{ url('/activitats2/show/'.$activitat->codi) }}" class="btn btn-primary mt-1" ><i class="fa fa-child"></i> Comença</a>
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

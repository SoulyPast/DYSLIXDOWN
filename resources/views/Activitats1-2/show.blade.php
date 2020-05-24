@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">
<h1 style="font-size:3vw;">{{$activitats->nom_activitat}}</h1>
<h2 id="Type" class = "{{$activitats->tipus->nom_tipus}}" style="font-size:2vw;"> {{$activitats->tipus->nom_tipus}}</h2>
<h2 class = "auth none" >{{Auth::user()->id}}</h2>
<h2 class = "active none" >{{$activitats->id}}</h2>
<div id="1" class="none center">
<img src="{{ asset('/Imatges/resultat/emoji1.png') }}" class="img-fluid mx-auto d-block" alt="Responsive image">
<h2 id="11" class="text-center">Bon intent però es pot millorar</h2>
</div>
<div id="2" class="none center">
<img src="{{ asset('/Imatges/resultat/smile5.png') }}" class="img-fluid mx-auto d-block" alt="Responsive image">
<h2 id="22" class="text-center">Bé</h2>
</div>
<div id="3" class="none center">
<img src="{{ asset('/Imatges/resultat/emoji10.png') }}" class="img-fluid mx-auto d-block" alt="Responsive image">
<h2 id="33" class="text-center" >Molt-bé</h2>
</div>
<a type="button" id="return" class="btn btn-info  btn-lg mt-1 none"   href="{{ url('/activitats') }}">Tornar</a>
<div>

</div>
<input id="id_activitat" class="none" type="number" value="{{$activitats->id}}" >
<div class="Començar wrap text-center justify-content backimg">
  <button class="button" id="Començar">Començar</button>
</div>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
@php($count=0)
@foreach($exercici as $key => $exerci)
@php($count++)
  <li class="nav-item ml-2 mt-3">
    <button class="nav-link none EExercici{{$count}}" id="pills-{{$exerci->id}}-tab" data-toggle="pill" href="#pills-{{$exerci->id}}" role="tab" aria-controls="pills-{{$exerci->id}}" aria-selected="true"  disabled>Exercici{{$count}}</button>
  </li>
@endforeach
</ul>
<div class="tab-content round" id="pills-tabContent" style="background-image: url('');text-align:center;background-repeat: no-repeat;  border: 2px solid #98BEF5;">
</div>



<div class="modal fade" id="myModal" role="dialog"  data-backdrop="static" >
    <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Valoració</h4>
        </div>

        <div class="modal-body text-center">
      <input id=rating0 type=radio value=0 name=rating checked />

        <label class=star for=rating1>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 275">
        <path stroke="#605a00" stroke-width="15"
        d="M150 25l29 86h90l-72 54 26 86-73-51-73 51 26-86-72-54h90z"/>
        </svg>
        </label>
        <input id=rating1 type=radio value=1 name=rating />
        <label class=star for=rating2>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 275">
        <path stroke="#605a00" stroke-width="15"
        d="M150 25l29 86h90l-72 54 26 86-73-51-73 51 26-86-72-54h90z"/>
        </svg>
        </label>
        <input id=rating2 type=radio value=2 name=rating />
        <label class=star for=rating3>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 275">
        <path stroke="#605a00" stroke-width="15"
        d="M150 25l29 86h90l-72 54 26 86-73-51-73 51 26-86-72-54h90z"/>
        </svg>
        </label>
        <input id=rating3 type=radio value=3 name=rating />
        <label class=star for=rating4>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 275">
        <path stroke="#605a00" stroke-width="15"
        d="M150 25l29 86h90l-72 54 26 86-73-51-73 51 26-86-72-54h90z"/>
        </svg>
        </label>
        <input id=rating4 type=radio value=4 name=rating />
        <label class=star for=rating5>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 300 275">
        <path stroke="#605a00" stroke-width="15"
        d="M150 25l29 86h90l-72 54 26 86-73-51-73 51 26-86-72-54h90z"/>
        </svg>
        </label>
        <input id=rating5 type=radio value=5 name=rating >
        <div id=texto style="display:none">sin calificar</div>
      </div>
        <div class="modal-footer">
        <button type="button" id="valorar" class="btn btn-primary"  data-dismiss="modal" aria-label="Close" disabled>Enviar</button>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('/Script/Exercicis.js') }}" defer></script>
<script src="{{ asset('/Script/Valoracions.js') }}" defer></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
@endsection

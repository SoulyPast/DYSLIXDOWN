@extends('layouts.master')
@section('content')
<h1>{{$activitas->nom_activitat}} </h1>
<h2 class = "{{$activitas->tipus->nom_tipus}}"> {{$activitas->tipus->nom_tipus}}</h2>
<h2 class = "auth" style="display:none"> {{Auth::user()->id}}</h2>
<div id="1" style="display:none; text-center">
<img src="http://localhost:8000/Imatges/resultat/emoji1.png" class="img-fluid mx-auto d-block" alt="Responsive image">
<h2 id="11" class="text-center">Bon intent però es pot millorar</h2>
</div>
<div id="2" style="display:none; text-center mx-auto d-block">
<img src="http://localhost:8000/Imatges/resultat/smile5.png" class="img-fluid mx-auto d-block" alt="Responsive image">
<h2 id="22" class="text-center">Bé</h2>
</div>
<div id="3" style="display:none;  text-center ">
<img src="http://localhost:8000/Imatges/resultat/emoji10.png" class="img-fluid mx-auto d-block" alt="Responsive image">
<h2 id="33" class="text-center" >Molt-bé</h2>
</div>
<div>

</div>
<input id="id_activitat" type="number" value="{{$activitas->id}}" style="display:none">
<div class="Començar wrap text-center justify-content" style="display:block;display: flex;align-items: center;justify-content: center;background-image: url('https://i.pinimg.com/originals/4a/96/e6/4a96e602750b8ef669a77565becf3939.gif');height:500px;">
  <button class="button" id="Començar">Començar</button>
</div>

<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
@php($count=0)
@foreach($exercici as $key => $exerci)
@php($count++)
  <li class="nav-item ml-2 mt-3">
    <button class="nav-link EExercici{{$count}}" id="pills-{{$exerci->id}}-tab" data-toggle="pill" href="#pills-{{$exerci->id}}" role="tab" aria-controls="pills-{{$exerci->id}}" aria-selected="true" style="display:none" disabled>Exercici{{$count}}</button>
  </li>
@endforeach
</ul>
<div class="tab-content " id="pills-tabContent" style="background-image: url('https://i.pinimg.com/originals/4a/96/e6/4a96e602750b8ef669a77565becf3939.gif');text-align:center;">
</div>

<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Valoració</h5>
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
@endsection
@section('scripts')
<script src="{{ asset('Script/Forma.js') }}" defer></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
@endsection

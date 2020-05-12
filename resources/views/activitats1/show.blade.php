@extends('layouts.master')
@section('content')
<h1>{{$activitas->nom_activitat}} </h1>
<h2 class = "{{$activitas->tipus->nom_tipus}}"> {{$activitas->tipus->nom_tipus}}</h2>
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
<div class="tab-content " id="pills-tabContent" style="background-image: url('https://i.pinimg.com/originals/4a/96/e6/4a96e602750b8ef669a77565becf3939.gif');">

</div>

@endsection
@section('scripts')
<script src="{{ asset('Script/Forma.js') }}" defer></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
@endsection

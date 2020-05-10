@extends('layouts.master')
@section('content')
<h1>{{$activitas->nom_activitat}} </h1>
<h2 class = "{{$activitas->tipus->nom_tipus}}"> {{$activitas->tipus->nom_tipus}}</h2>
<input id="id_activitat" type="number" value="{{$activitas->id}}" style="display:none">
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
@php($count=0)
@foreach($exercici as $key => $exerci)
@php($count++)
  <li class="nav-item ml-2 mt-3">
    <a class="nav-link" id="pills-{{$exerci->id}}-tab" data-toggle="pill" href="#pills-{{$exerci->id}}" role="tab" aria-controls="pills-{{$exerci->id}}" aria-selected="true" >Exercici{{$count}}</a>
  </li>
@endforeach
</ul>
<div class="tab-content" id="pills-tabContent">

<div class="tab-pane fade" id="pills-18" role="tabpanel" aria-labelledby="pills-18-tab">
<div class="content border border-primary">
<button  class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici2" style="height:50px;width:50px;">D</button>
<button type="button" class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici2" style="height:50px;width:50px;">E</button>
<button type="button" class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici2" style="height:50px;width:50px;">U</button>
<input class="btn btn-primary resetExercici2" type="reset" value="Reset">
</div>
</div>


</div>
@endsection
@section('scripts')
<script src="{{ asset('Script/Forma.js') }}" defer></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
@endsection

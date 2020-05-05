@extends('layouts.master')
@section('content')
<h1>{{$activitas->nom_activitat}} : {{$activitas->categoria_activiatat}}</h1>
<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" >Exercici1</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" >Exercici2</a>
  </li>
</ul>
<div class="tab-content" id="pills-tabContent">
  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">

  <div class="content border border-primary">
<button type="button" name="nombre1" class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici1" style="height:50px;width:50px;">H</button>
<button type="button" class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici1" style="height:50px;width:50px;">O</button>
<button type="button" class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici1" style="height:50px;width:50px;">A</button>
<button type="button" class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici1" style="height:50px;width:50px;">L</button>
<input class="btn btn-primary resetExercici1" type="reset" value="Reset">
</div>
  </div>
  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
<div class="content border border-primary">
<button type="button" class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici2" style="height:50px;width:50px;">D</button>
<button type="button" class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici2" style="height:50px;width:50px;">E</button>
<button type="button" class="rounded-circle rounded-sm border border-danger d-flex p-2 justify-content-center btn Exercici2" style="height:50px;width:50px;">U</button>
<input class="btn btn-primary resetExercici2" type="reset" value="Reset">
</div>
  </div>

</div>

@endsection
@section('scripts')
<script src="{{ asset('Script/Forma.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection

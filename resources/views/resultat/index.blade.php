@extends('layouts.master')
@section('content')
<div class="container">
<h1 class=" mt-4">Resultats de les teves activitats:</h1>
<div class="table-responsive-sm">
<table class="table mt-4">
  <thead>
  <tr class="table-secondary" style="text-align: center;">
      <th scope="col">Títol</th>
      <th scope="col">Valoració</th>
      <th scope="col">Accions</th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
  @foreach( $valoracio as $key => $val )
  <tr>
            <td>{{$val->activitat->nom_activitat}}</td>
            <td>{{$val->quantity}}</td>
            <td>
            <a type="button" class="btn btn-info mt-1" href="{{ url('/resultat/'.$val->activitat_id) }}">Mostrar</a>
            </td>
</tr>
        @endforeach
  </tbody>
</table>
</div>
</div>
@stop

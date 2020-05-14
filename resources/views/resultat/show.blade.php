@extends('layouts.master')
@section('content')
<div class="container">
<div class="table-responsive-sm">
<table class="table mt-4">
  <thead>
  <tr class="table-secondary" style="text-align: center;">
      <th scope="col">Nom Alumne:</th>
      <th scope="col">Puntuació</th>
      <th scope="col">respuestes del alumne</th>
      <th scope="col">respuestas</th>
    </tr>
  </thead>
  <tbody style="text-align: center;">
  @foreach( $resultats as $key => $res )
  <tr>
            <td>{{$res->user->name}}</td>
            <td>{{$res->puntuacio}}</td>
            <td>{{$res->eroors}}</td>
            <td>

            </td>
</tr>
        @endforeach
  </tbody>
</table>
</div>
@stop

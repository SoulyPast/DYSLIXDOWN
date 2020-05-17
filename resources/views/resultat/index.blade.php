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
  <tbody style="text-align: center;" class="bg-light">
  @foreach( $valoracio as $key => $val )
  <tr>
            <td>{{$val->activitat->nom_activitat}}</td>
            <td>
            @for ($i = 0; $i < $val->quantity; $i++)
            <svg class="bi bi-star-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
             <path d="M3.612 15.443c-.386.198-.824-.149-.746-.592l.83-4.73L.173 6.765c-.329-.314-.158-.888.283-.95l4.898-.696L7.538.792c.197-.39.73-.39.927 0l2.184 4.327 4.898.696c.441.062.612.636.283.95l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256z"/>
            </svg>
            @endfor
            </td>
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

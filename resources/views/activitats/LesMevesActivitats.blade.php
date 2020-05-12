@extends('layouts.master')
@section('content')
<div class="container">
<h1 class=" mt-4">Llista de les teves activitats creades</h1>
<a type="button" class="btn btn-primary mt-4" href="{{ url('/activitats/create') }}">Afegir Activitat</a>
<div class="table-responsive-sm">
<table class="table mt-4">
  <thead >
  <tr class="table-secondary" style="text-align: center;">
      <th scope="col">Títol</th>
      <th scope="col">Public</th>
      <th scope="col">Acabat</th>
      <th scope="col">Accions</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $activitas as $key => $activitat )
    <tr style="text-align: center;">
      <td> {{$activitat->nom_activitat}} </td>
      <td>
      @if($activitat->public)
      <a>Si</a>
      @else
      <a>No</a>
      @endif
      </td>
      <td>
      @if($activitat->acabat)
      <a>Si</a>
      @else
      <a>No</a>
      @endif
      </td>
      <td>
      <a type="button" class="btn btn-info mt-1" href="{{ url('/activitats/showActivitat/'.$activitat->id) }}">Mostrar</a>
      <a type="button" class="btn btn-warning mt-1" href="{{ url('/activitat/edita/'.$activitat->id) }}">Editar</a>
      @if(($activitat->tipus_id)==1)
      <a type="button" class="btn btn-success mt-1" href="{{ url('/activitat/show1Exercicis/'.$activitat->id) }}">Exercicis</a>
      @else
      <a type="button" class="btn btn-success mt-1" href="{{ url('/activitat/show2Exercicis/'.$activitat->id) }}">Exercicis</a>
      @endif


      <form action="{{ action('activitats@deleteActivitats', $activitat->id) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-danger mt-1" style="display:inline"> <span class="glyphicon glyphicon-trash"></span>  Eliminar Activitat </button>
      </form>
      </td>
    </tr>
        @endforeach
  </tbody>
</table>
</div>
</div>
@stop

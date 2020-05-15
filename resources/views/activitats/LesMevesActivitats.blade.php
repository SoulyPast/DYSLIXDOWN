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
    <tr id="{{$activitat->id}}" style="text-align: center;" class="table-light">
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


        <button type="submit" class="btn btn-danger del mt-1" style="display:inline" onclick="ActivitatDELETE({{$activitat->id}})"> <span class="glyphicon glyphicon-trash"></span>  Eliminar Activitat </button>

      </td>
    </tr>
        @endforeach
  </tbody>
</table>
</div>
</div>
@stop
@section('scripts')
<script src="{{ asset('Script/delete.js') }}" defer></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
@endsection

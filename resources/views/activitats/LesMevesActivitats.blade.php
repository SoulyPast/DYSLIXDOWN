@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">

<div class="container">
<h1 class=" mt-4">Llista de les teves activitats :</h1>
<a type="button" class="btn btn-primary mt-4" href="{{ url('/activitats/create') }}">Afegir Activitat</a>
<div class="table-responsive-sm">
<table class="table mt-4">
  <thead >
  <tr class="table-secondary center" >
      <th scope="col">Títol</th>
      <th scope="col">Privacitat</th>
      <th scope="col">Estat</th>
      <th scope="col">Accions</th>
    </tr>
  </thead>
  <tbody>
  @foreach( $activitats as $key => $activitat )
    <tr id="{{$activitat->id}}"  class="table-light center">
      <td> {{$activitat->nom_activitat}} </td>
      <td>
      @if($activitat->public)
      <a>Pública</a>
      @else
      <a>Privada</a>
      @endif
      </td>
      <td>
      @if($activitat->acabat)
      <a>Acabada</a>
      @else
      <a>En procés</a>
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
      <button type="submit" class="btn btn-danger del mt-1" style="display:inline" onclick="ActivitatDELETE({{$activitat->id}})"> <span class="glyphicon glyphicon-trash"></span>  Eliminar </button>
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
@endsection

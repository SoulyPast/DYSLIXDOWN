@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">

<div class="container">
<h1 class=" mt-4">Llista de les teves activitats :</h1>
<a type="button" class="btn btn-primary mt-4" href="{{ url('/activitats/create') }}"><i class="fa fa-plus"></i> Afegir Activitat</a>
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
      <a type="button" class="btn btn-info mt-1" href="{{ url('/activitats/showActivitat/'.$activitat->id) }}"><i class="fa fa-info-circle"></i> Mostrar</a>
      <a type="button" class="btn btn-warning mt-1" href="{{ url('/activitat/edita/'.$activitat->id) }}"><i class="fa fa-edit"></i> Editar</a>
      @if(($activitat->tipus_id)==1)
      <a type="button" class="btn btn-success mt-1" href="{{ url('/activitat/show1Exercicis/'.$activitat->id) }}"><i class="fa fa-book"></i> Exercicis</a>
      @else
      <a type="button" class="btn btn-success mt-1" href="{{ url('/activitat/show2Exercicis/'.$activitat->id) }}"><i class="fa fa-book"></i> Exercicis</a>
      @endif
      <button type="submit" class="btn btn-danger del mt-1" style="display:inline" onclick="ActivitatDELETE({{$activitat->id}})"> <span class="glyphicon glyphicon-trash"></span><i class="fa fa-trash"></i>  Eliminar </button>
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
</div>
</div>

<div class="modal"  id="confirm" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      </div>
      <div class="modal-body">
        <p>Segur que voleu suprimir-ho?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" id="delete">Eliminar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
@stop
@section('scripts')
<script src="{{ asset('Script/delete.js') }}" defer></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
@endsection

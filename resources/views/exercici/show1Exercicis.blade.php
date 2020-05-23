@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">
<div class="container">
<h2 class="text"> {{$activitats->nom_activitat}} </h2>
<h2 class="text"> Tipus :  {{ $activitats->tipus->nom_tipus }}</h2>
<button type="button" class="btn btn-primary mt-4"  id="afegir" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-plus"></i> Afegir Exercici</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> <i class="fa fa-plus"></i> Afegir Exercici:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ url('/activitat/show1Exercicis',$activitats->id) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @if(($activitats->nivell_id)==1)
      <div class="form-group">
        <label for="paraula">Paraula</label>
        <input type="text" class="form-control mb-2 mt-2" name="paraula"  aria-describedby="paraula" placeholder="Escriu la palabra" maxlength="4" minlength="2" required>
        <small id="textHelp" class="form-text text-muted mb-2 mt-2">Recorda que el nivell d'activitat és fàcil com a màxim La mida o longitud d'una paraula és de quatre</small>
        <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      </div>
      @elseif(($activitats->nivell_id)==2)
      <div class="form-group">
        <label for="paraula">Paraula</label>
        <input type="text" class="form-control mb-2 mt-2" name="paraula" aria-describedby="paraula" placeholder="Escriu la palabra" maxlength="6" minlength="4" required>
        <small id="textHelp" class="form-text text-muted mb-2 mt-2">Recorda que el nivell d'activitat és normal com a màxim La mida o longitud d'una paraula és de sis</small>
        <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      </div>
      @else
      <div class="form-group">
        <label for="paraula">Paraula</label>
        <input type="text" class="form-control mb-2 mt-2" name="paraula"  aria-describedby="paraula" placeholder="Escriu la palabra" maxlength="10" minlength="6" required>
        <small id="textHelp" class="form-text text-muted">Recorda que el nivell d'activitat és dificil com a màxim La mida o longitud d'una paraula és de 10</small>
        <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      </div>
      @endif

      </form>
      </div>


    </div>
  </div>
</div>
<br>
<table class="table mt-5 table-responsive-sm">
  <thead  class="table-secondary text-center" >
    <tr>
      <th scope="col">Exercicis</th>
      <th scope="col">Paraula</th>
      <th scope="col">Accions</th>
    </tr>
  </thead>
  <tbody class="bg-light">
  @php($count=0)
  @foreach( $Exercicis as $key => $Exercici )
  @php($count++)
    <tr class="text-center" id="{{$Exercici->id}}">
      <th scope="row"> Exercici {{$count}}</th>
      <td>{{$Exercici->resposta}}</td>
      <td>
      <a type="button" class="btn btn-warning mb-1"  data-toggle="modal" data-target="#ModalCenter{{$Exercici->id}}"><i class="fa fa-edit"></i> Editar</a>
<!-- Modal -->
<div class="modal fade" id="ModalCenter{{$Exercici->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Editar Exercici:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body start">
      <form action="{{ url('/activitat/show1ExercicisEdit/'.$Exercici->id) }}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{ csrf_field() }}
      @if(($activitats->nivell_id)==1)
      <div class="form-group">
        <label for="paraula">Paraula</label>
        <input type="number" class="form-control" name="id_activitat" value="{{$activitats->id}}" style="display:none">
        <input type="text" class="form-control mb-2 mt-2" name="paraula"  aria-describedby="paraula" placeholder="Escriu la palabra" value="{{$Exercici->resposta}}" maxlength="4" minlength="2" required>
        <small id="texthelp pt-2 pb-2" class="form-text text-muted mb-2 mt-2">Recorda que el nivell d'activitat és fàcil com a màxim La mida o longitud d'una paraula és de quatre</small>
        <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      </div>
      @elseif(($activitats->nivell_id)==2)
      <div class="form-group">
        <label for="paraula">Paraula</label>
        <input type="number" class="form-control" name="id_activitat"  value="{{$activitats->id}}" style="display:none">
        <input type="text" class="form-control mb-2 mt-2" name="paraula"  aria-describedby="paraula" placeholder="Escriu la palabra" value="{{$Exercici->resposta}}" maxlength="6" minlength="4" required>
        <small id="texthelp" class="form-text text-muted mb-2 mt-2">Recorda que el nivell d'activitat és normal com a màxim La mida o longitud d'una paraula és de sis</small>
        <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      </div>
      @else
      <div class="form-group">
        <label for="paraula">Paraula</label>
        <input type="number" class="form-control" name="id_activitat"  value="{{$activitats->id}}" style="display:none">
        <input type="text" class="form-control mb-2 mt-2" name="paraula"  aria-describedby="paraula" placeholder="Escriu la palabra" value="{{$Exercici->resposta}}" maxlength="10" minlength="6" required>
        <small id="texthelp" class="form-text text-muted mb-2 mt-2">Recorda que el nivell d'activitat és dificil com a màxim La mida o longitud d'una paraula és de 10</small>
        <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      </div>
      @endif
      </form>
      </div>
    </div>
  </div>
</div>

<form action="{{ action('exercicis@deletexercici', $Exercici->id) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="text" class="form-control " name="id_activitat"  value="{{$activitats->id}}" style="display:none">
                    <button type="submit" class="btn btn-danger mb-1" style="display:inline"> <i class="fa fa-trash"></i>  Eliminar </button>
                </form>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>

<div class="row text-light bg-dark mb-1">
    <div class="col-sm mt-2 px-md-5 ">
    Total de Exercicis : {{$count}}
    <input type="number" readonly class="form-control-plaintext" id="staticount" value="{{$count}}" style="display:none">
    </div>

    @if(($count)>4)
                @if($activitats->acabat)
                <div class="col-sm mt-2">
                Activitat Activa
                </div>
                <form action="{{ action('exercicis@putNoAcabat', $activitats->id) }}" method="POST" style="display:inline">
                {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="col-sm mt-2 mb-1 px-md-5">
                    <button type="submit" class="btn btn-warning" style="display:inline"><i class="fa fa-power-off" aria-hidden="true"></i> Desactiva </button>
                    </div>
                </form>
                 @else
                 <div class="col-sm mt-2">
                Activitat En procés
                </div>
                <form action="{{ action('exercicis@putAcabat', $activitats->id) }}" method="POST" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="col-sm mt-1 mb-1 px-md-5">
                    <button type="submit" class="btn btn-success" style="display:inline"><i class="fa fa-check" aria-hidden="true"></i>  Activa </button>
                    </div>
                </form>
    @endif
    @endif

  </div>
</div>
@stop
@section('scripts')
<script src="{{ asset('Script/Extra.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection

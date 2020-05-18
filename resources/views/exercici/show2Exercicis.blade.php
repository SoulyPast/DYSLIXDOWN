@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">
<div class="container">
<h2 class="text"> {{$activitats->nom_activitat}} </h2>
<h2 class="text"> Tipus :  {{ $activitats->tipus->nom_tipus }}</h2>
<button type="button" class="btn btn-primary mt-4"   id="afegir" data-toggle="modal" data-target="#exampleModalCenter">Afegir Exercici</button>

<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document" >
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Afegir Exercici:</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="{{ url('/activitat/show2Exercicis',$activitats->id) }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}
      @if(($activitats->nivell_id)==1)
      <div class="form-group">
        <label for="opcio1"> Opció 1 Correcta </label>
        <input type="text" maxlength="10" class="form-control" name="opcio1" id="opcio1" aria-describedby="resposta" placeholder="Posa la resposta correcte" required>
      </div>
      <div class="form-group">
        <label for="opcio2"> Opció 2 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio2" id="opcio2" aria-describedby="opcio2" placeholder="Opció 2" required>
      </div>
      <div class="form-group">
        <label for="opcio3"> Opció 3 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio3" id="opcio3" aria-describedby="opcio3" placeholder="Opció 3" required>
      </div>
      <div class="form-group">
        <label for="opcio4"> Opció 4 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio4" id="opcio4" aria-describedby="opcio4" placeholder="Opció 4" required>
      </div>
      <div class="form-group">
      <small id="textHelp" maxlength="10" class="form-text text-muted">Recorda que el nivell d'activitat és fàcil com a màxim tendra 4 opcions.</small>
      </div>
      <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      @elseif(($activitats->nivell_id)==2)
      <div class="form-group">
        <label for="opcio1"> Opció 1 Correcta </label>
        <input type="text" maxlength="10" class="form-control" name="opcio1" id="opcio1" aria-describedby="resposta" placeholder="Posa la resposta correcte" required>
      </div>
      <div class="form-group">
        <label for="opcio2"> Opció 2 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio2" id="opcio2" aria-describedby="opcio2" placeholder="Opció 2" required>
      </div>
      <div class="form-group">
        <label for="opcio3"> Opció 3 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio3" id="opcio3" aria-describedby="opcio3" placeholder="Opció 3" required>
      </div>
      <div class="form-group">
        <label for="opcio4"> Opció 4 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio4" id="opcio4" aria-describedby="opcio4" placeholder="Opció 4" required>
      </div>
      <div class="form-group">
        <label for="opcio5"> Opció 5 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio5" id="opcio5" aria-describedby="opcio5" placeholder="Opció 5" required>
      </div>
      <div class="form-group">
        <label for="opcio6" maxlength="10" > Opció 6 </label>
        <input type="text" class="form-control" name="opcio6" id="opcio6" aria-describedby="opcio6" placeholder="Opció 6" required>
      </div>
      <div class="form-group">
      <small id="textHelp" class="form-text text-muted">Recorda que el nivell d'activitat és norma com a màxim tendra 6 opcions.</small>
      </div>
      <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      @else
      <div class="form-group">
        <label for="opcio1"> Opció 1 Correcta </label>
        <input type="text" maxlength="10" class="form-control" name="opcio1" id="opcio1" aria-describedby="resposta" placeholder="Posa la resposta correcte" required>
      </div>
      <div class="form-group">
        <label for="opcio2"> Opció 2 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio2" id="opcio2" aria-describedby="opcio2" placeholder="Opció 2" required>
      </div>
      <div class="form-group">
        <label for="opcio3"> Opció 3 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio3" id="opcio3" aria-describedby="opcio3" placeholder="Opció 3" required>
      </div>
      <div class="form-group">
        <label for="opcio4"> Opció 4 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio4" id="opcio4" aria-describedby="opcio4" placeholder="Opció 4" required>
      </div>
      <div class="form-group">
        <label for="opcio5"> Opció 5 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio5" id="opcio5" aria-describedby="opcio5" placeholder="Opció 5" required>
      </div>
      <div class="form-group">
        <label for="opcio6"> Opció 6 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio6" id="opcio6" aria-describedby="opcio6" placeholder="Opció 6" required>
      </div>
      <div class="form-group">
        <label for="opcio7"> Opció 7 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio7" id="opcio7" aria-describedby="opcio7" placeholder="Opció 7" required>
      </div>
      <div class="form-group">
        <label for="opcio8"> Opció 8 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio8" id="opcio8" aria-describedby="opcio8" placeholder="Opció 8" required>
      </div>
      <div class="form-group">
      <small id="textHelp" maxlength="10" class="form-text text-muted">Recorda que el nivell d'activitat és norma com a màxim tendra 8 opcions.</small>
      </div>
      <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      @endif

      </form>
      </div>


    </div>
  </div>
</div>
<br>
<table class="table mt-5 table-responsive-sm">
  <thead class="table-secondary text-center">
    <tr>
      <th scope="col">Exercicis</th>
      <th scope="col">Paraula Correcta</th>
      <th scope="col">Paraules Incorrectes</th>
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
      <td>{{$Exercici->opcio1}}  {{$Exercici->opcio2}}  {{$Exercici->opcio3}}  {{$Exercici->opcio4}}  {{$Exercici->opcio5}}  {{$Exercici->opcio6}}  {{$Exercici->opcio7}}</td>
      <td>
      <a type="button" class="btn btn-warning"  data-toggle="modal" data-target="#ModalCenter{{$Exercici->id}}">Editar</a>
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
      <form action="{{ url('/activitat/show2ExercicisEdit/'.$Exercici->id) }}" method="post" enctype="multipart/form-data">
            {{method_field('PUT')}}
            {{ csrf_field() }}
      @if(($activitats->nivell_id)==1)
        <input type="number" class="form-control" name="id_activitat" id="id_activitat" value="{{$activitats->id}}" style="display:none">
        <div class="form-group">
        <label for="opcio1"> Opció 1 Correcta </label>
        <input type="text" maxlength="10" class="form-control" name="opcio1" id="opcio1" aria-describedby="opcio1" placeholder="Posa la resposta correcte" value="{{$Exercici->resposta}}" required >
      </div>
      <div class="form-group">
        <label for="opcio2"> Opció 2 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio2" id="opcio2" aria-describedby="opcio2" placeholder="Opció 2" value="{{$Exercici->opcio1}}" required>
      </div>
      <div class="form-group">
        <label for="opcio3"> Opció 3 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio3" id="opcio3" aria-describedby="opcio3" placeholder="Opció 3" value="{{$Exercici->opcio2}}" required>
      </div>
      <div class="form-group">
        <label for="opcio4"> Opció 4 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio4" id="opcio4" aria-describedby="opcio4" placeholder="Opció 4" value="{{$Exercici->opcio3}}" required>
      </div>
      <div class="form-group">
      <small id="textHelp" class="form-text text-muted">Recorda que el nivell d'activitat és fàcil com a màxim tendra 4 opcions.</small>
      </div>
      <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      @elseif(($activitats->nivell_id)==2)
        <input type="number" class="form-control" name="id_activitat" id="id_activitat" value="{{$activitats->id}}" style="display:none">
        <div class="form-group">
        <label for="opcio1"> Opció 1 Correcta </label>
        <input type="text" maxlength="10" class="form-control" name="opcio1" id="opcio1" aria-describedby="opcio1" placeholder="Posa la resposta correcte" value="{{$Exercici->resposta}}" required>
      </div>
      <div class="form-group">
        <label for="opcio2"> Opció 2 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio2" id="opcio2" aria-describedby="opcio2" placeholder="Opció 2"  value="{{$Exercici->opcio1}}" required>
      </div>
      <div class="form-group">
        <label for="opcio3"> Opció 3 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio3" id="opcio3" aria-describedby="opcio3" placeholder="Opció 3" value="{{$Exercici->opcio2}}" required>
      </div>
      <div class="form-group">
        <label for="opcio4"> Opció 4 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio4" id="opcio4" aria-describedby="opcio4" placeholder="Opció 4" value="{{$Exercici->opcio3}}" required>
      </div>
      <div class="form-group">
        <label for="opcio5"> Opció 5 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio5" id="opcio5" aria-describedby="opcio5" placeholder="Opció 5" value="{{$Exercici->opcio4}}" required>
      </div>
      <div class="form-group">
        <label for="opcio6"> Opció 6 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio6" id="opcio6" aria-describedby="opcio6" placeholder="Opció 6" value="{{$Exercici->opcio5}}" required>
      </div>
      <div class="form-group">
      <small id="textHelp" class="form-text text-muted">Recorda que el nivell d'activitat és norma com a màxim tendra 6 opcions.</small>
      </div>
      <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      @else
        <input type="number" class="form-control" name="id_activitat" id="id_activitat" value="{{$activitats->id}}" style="display:none">
        <div class="form-group">
        <label for="opcio1"> Opció 1 Correcta </label>
        <input type="text" maxlength="10" class="form-control" name="opcio1" id="opcio1" aria-describedby="opcio1" placeholder="Posa la resposta correcte" value="{{$Exercici->resposta}}" required>
      </div>
      <div class="form-group">
        <label for="opcio2"> Opció 2 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio2" id="opcio2" aria-describedby="opcio2" placeholder="Opció 2" value="{{$Exercici->opcio1}}" required>
      </div>
      <div class="form-group">
        <label for="opcio3"> Opció 3 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio3" id="opcio3" aria-describedby="opcio3" placeholder="Opció 3" value="{{$Exercici->opcio2}}" required>
      </div>
      <div class="form-group">
        <label for="opcio4"> Opció 4 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio4" id="opcio4" aria-describedby="opcio4" placeholder="Opció 4" value="{{$Exercici->opcio3}}" required>
      </div>
      <div class="form-group">
        <label for="opcio5"> Opció 5 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio5" id="opcio5" aria-describedby="opcio5" placeholder="Opció 5" value="{{$Exercici->opcio4}}" required>
      </div>
      <div class="form-group">
        <label for="opcio6"> Opció 6 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio6" id="opcio6" aria-describedby="opcio6" placeholder="Opció 6" value="{{$Exercici->opcio5}}" required>
      </div>
      <div class="form-group">
        <label for="opcio7"> Opció 7 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio7" id="opcio7" aria-describedby="opcio7" placeholder="Opció 7" value="{{$Exercici->opcio6}}" required>
      </div>
      <div class="form-group">
        <label for="opcio8"> Opció 8 </label>
        <input type="text" maxlength="10" class="form-control" name="opcio8" id="opcio8" aria-describedby="opcio8" placeholder="Opció 8" value="{{$Exercici->opcio7}}" required>
      </div>
      <div class="form-group">
      <small id="textHelp" class="form-text text-muted">Recorda que el nivell d'activitat és norma com a màxim tendra 6 opcions.</small>
      </div>
      <button class="btn btn-primary" type="submit" value="Submit" >Guardar</button>
      @endif
      </form>
      </div>
    </div>
  </div>
</div>



<form action="{{ action('exercicis@deletexercici', $Exercici->id) }}" method="POST" style="display:inline">
                    {{ method_field('DELETE') }}
                    {{ csrf_field() }}
                    <input type="text" class="form-control" name="id_activitat"  value="{{$activitats->id}}" style="display:none">
                    <button type="submit" class="btn btn-danger" style="display:inline"> <span class="glyphicon glyphicon-trash"></span>  Eliminar </button>
                </form>
      </td>
    </tr>

    @endforeach
  </tbody>
</table>
<div class="row text-light bg-dark mb-1">
    <div class="col-sm mt-3 px-md-5 ">
    Total de Exercicis : {{$count}}
    <input type="number" readonly class="form-control-plaintext" id="staticount" value="{{$count}}" style="display:none">
    </div>

    @if(($count)>4)
                @if($activitats->acabat)
                <div class="col-sm mt-3">
                Actividad Activa
                </div>
                <form action="{{ action('exercicis@putNoAcabat', $activitats->id) }}" method="POST" style="display:inline">
                {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="col-sm mt-2 mb-2 px-md-5">
                    <button type="submit" class="btn btn-warning" style="display:inline"> Desactiva </button>
                    </div>
                </form>
                 @else
                 <div class="col-sm mt-3">
                Activitat En procés
                </div>
                <form action="{{ action('exercicis@putAcabat', $activitats->id) }}" method="POST" style="display:inline">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="col-sm mt-2 mb-2 px-md-5">
                    <button type="submit" class="btn btn-success" style="display:inline"> Activa </button>
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


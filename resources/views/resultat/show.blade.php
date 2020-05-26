@extends('layouts.master')
@section('content')
<div class="container">
<div class="table-responsive-sm">
<table class="table mt-4">
  <thead>
  <tr class="table-secondary" style="text-align: center;">
      <th scope="col">Nom Alumne:</th>
      <th scope="col">Puntuació</th>
      <th scope="col">Respuestes del alumne</th>
      <th scope="col">Total d'errors</th>
    </tr>
  </thead>
  <tbody   class="bg-light" style="text-align: center;">
  @foreach( $resultats as $key => $res )
  <tr>
            <td>{{$res->user->name}}</td>
            <td>
                @if ($res->puntuacio==1)
                    Malament
                @elseif ($res->puntuacio==3)
                    Molt bé
                @else
                    Bé
                @endif

            </td>
            <td>
            <?php
                    $resp = explode(",", $res->eroors);
                    foreach($resp as $clave=>$valor){
                        if(empty($valor)) unset($resp[$clave]);
                        }
                    ?>
                                Respuestas correctas:<a style="color:green">{{$res->correctes}}</a><br>
                                Respuestas incorrectas:<a style="color:red">{{$res->eroors}}</a>
            </td>
            <td>
            {{ count($resp) }}
            </td>

</tr>
        @endforeach
  </tbody>
</table>
</div>
@stop

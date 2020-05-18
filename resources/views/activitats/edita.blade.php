@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">
<div class="mrg">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">
                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                Edita la teva activitat :
            </h3>
        </div>

        <div class="panel-body bg-light">

        <form action="{{ url('/activitat/edita/'.$activitat->id) }}" method="post" enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{ csrf_field() }}

            <div class="form-group">
  					<label for="nom">Nom :</label>
  					<input type="text" name="nom" id="nom" class="form-control" maxlength="20" value="{{$activitat->nom_activitat}}">
					</div>

					<div class="form-group">
                    <label for="descripcio">Descripció :</label>
                    <textarea type="text" name="descripcio" id="descripcio" class="form-control" value="">{{$activitat->descripcio_activiatat}}</textarea>
					</div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Privacitat de l'activitat :</label>
                        <select class="form-control select"  name="estat" id="estat" >
                        <option> Public </option>
                        <option> Privat </option>
                        </select>
                    </div>
                    <input type="number" name="tipus" id="tipus" class="form-control none" value="{{$activitat->tipus_id}}" >

                    <input type="number" name="codi" id="codi" class="form-control none" value="{{$activitat->codi}}" >

                    <input type="number" name="nivell" id="nivell" class="form-control none" value="{{$activitat->nivell_id}}" >

                    @if($activitat->acabat)
                    <input type="number" name="acabat" id="acabat" class="form-control none" value="1" >
                    @else
                    <input type="number" name="acabat" id="acabat" class="form-control none" value="0" >
                    @endif


					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary ">
                        Actualiza l'activitat
						</button>
					</div>
            </form>
        </div>
    </div>
</div>

@endsection

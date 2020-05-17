@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">
<div class="mrg">
<div class="bg-light">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center pt-4">
                <span class="glyphicon glyphicon-film " aria-hidden="true"></span>
                Afegir una nova activitat:
            </h3>
        </div>

        <div class="panel-body" >

    <form action="{{ url('/activitats/create') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

            <div class="form-group">
  					<label for="nom">Nom :</label>
  					<input type="text" name="nom" id="nom" class="form-control" placeholder="Nom de l'activitat" required>
					</div>

					<div class="form-group">
                    <label for="descripcio">Descripció :</label>
                    <textarea type="text" name="descripcio" id="descripcio" class="form-control"  placeholder="Descripció de l'activitat" required></textarea>
					</div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Selecciona el tipus :</label>
                        <select class="form-control select"  name="tipus" id="tipus">
                        @foreach( $Tipus as $key => $tipu )
                        <option>{{$tipu->nom_tipus}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Selecciona el nivell :</label>
                        <select class="form-control select"  name="nivell" id="nivell">
                        @foreach( $Nivells as $key => $Nivell )
                        <option>{{$Nivell->nom_nivell}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Selecciona l'estat :</label>
                        <select class="form-control select"  name="estat" id="estat">
                        <option> Public </option>
                        <option> Privat </option>
                        </select>
                    </div>

					<div class="form-group text-center">
						<button type="submit bt" class="btn btn-primary" >
                        Afegir Activitat
						</button>
					</div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

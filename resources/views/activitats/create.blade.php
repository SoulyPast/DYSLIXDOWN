@extends('layouts.master')
@section('content')
<div class="" style="margin-top:20px">
<div class="">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">
                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                Afegir una nova activitat:
            </h3>
        </div>

        <div class="panel-body" style="padding:30px">

    <form action="{{ url('/activitats/create') }}" method="post" enctype="multipart/form-data">
      {{ csrf_field() }}

            <div class="form-group">
  					<label for="nom">Nom</label>
  					<input type="text" name="nom" id="nom" class="form-control" required>
					</div>

					<div class="form-group">
                    <label for="descripcio">Descripció</label>
                    <textarea type="text" name="descripcio" id="descripcio" class="form-control" required></textarea>
					</div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Selecciona el tipus :</label>
                        <select class="form-control"  name="tipus" id="tipus" style="height:40px">
                        @foreach( $Tipus as $key => $tipu )
                        <option>{{$tipu->nom_tipus}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Selecciona el nivell :</label>
                        <select class="form-control"  name="nivell" id="nivell" style="height:40px">
                        @foreach( $Nivells as $key => $Nivell )
                        <option>{{$Nivell->nom_nivell}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Selecciona l'estat :</label>
                        <select class="form-control"  name="estat" id="estat" style="height:40px">
                        <option> Public </option>
                        <option> Privat </option>
                        </select>
                    </div>

					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;">
                        Afegir Activitat
						</button>
					</div>




            </form>

        </div>
    </div>
</div>
</div>

@endsection

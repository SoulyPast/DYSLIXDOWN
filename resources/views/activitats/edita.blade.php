@extends('layouts.master')
@section('content')
<div class="" style="margin-top:20px">
<div class="">

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title text-center">
                <span class="glyphicon glyphicon-film" aria-hidden="true"></span>
                Edita la teva activitat :
            </h3>
        </div>

        <div class="panel-body" style="padding:30px">

        <form action="{{ url('/activitat/edita/'.$activitat->id) }}" method="post" enctype="multipart/form-data">
                {{method_field('PUT')}}
                {{ csrf_field() }}

            <div class="form-group">
  					<label for="nom">Nom</label>
  					<input type="text" name="nom" id="nom" class="form-control" value="{{$activitat->nom_activitat}}">
					</div>

					<div class="form-group">
                    <label for="descripcio">Descripció</label>
                    <textarea type="text" name="descripcio" id="descripcio" class="form-control" value="">{{$activitat->descripcio_activiatat}}</textarea>
					</div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Selecciona l'estat :</label>
                        <select class="form-control"  name="estat" id="estat" style="height:40px">
                        <option> Public </option>
                        <option> Privat </option>
                        </select>
                    </div>

                    <input type="number" name="tipus" id="tipus" class="form-control" value="{{$activitat->tipus_id}}" style="display :none;">

                    <input type="number" name="codi" id="codi" class="form-control" value="{{$activitat->codi}}" style="display :none;">

                    <input type="number" name="nivell" id="nivell" class="form-control" value="{{$activitat->nivell_id}}" style="display :none;">

                    @if($activitat->acabat)
                    <input type="number" name="acabat" id="acabat" class="form-control" value="1" style="display :none;">
                    @else
                    <input type="number" name="acabat" id="acabat" class="form-control" value="0" style="display :none;">
                    @endif


					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary" style="padding:8px 100px;margin-top:25px;" >
                        Actualiza l'activitat
						</button>
					</div>
            </form>
        </div>
    </div>
</div>
</div>

@endsection

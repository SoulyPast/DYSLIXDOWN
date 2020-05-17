@extends('layouts.master')
@section('content')
<div class="container">

<div class="text-center mt-5">
<div class="col-sm-5 col-centered mt-5" style="float:none; margin: 0 auto;">
<img src="{{ asset('Imatges/play/play.jpg') }}" alt="..." class="img-thumbnail">
<form>
  <div class="form-group mt-5">
    <input type="number" class="form-control mb-3" id="input" placeholder="Code" required>
    <button type="submit" id="play" class="btn btn-primary mb-2 btn-lg" disabled>Enter</button>
</div>
</div>


<div>
@stop
@section('scripts')
<script src="{{ asset('Script/play.js') }}" defer></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
@endsection

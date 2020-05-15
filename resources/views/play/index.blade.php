@extends('layouts.master')
@section('content')
<div class="container">

<div class="text-center">

    <label for="inputPassword2" class="sr-only">Password</label>
    <input type="number" class="form-control" id="input" placeholder="Code" required>

  <button type="submit" id="play" class="btn btn-primary mb-2">Enter</button>


<div>
@stop
@section('scripts')
<script src="{{ asset('Script/play.js') }}" defer></script>
<script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
@endsection

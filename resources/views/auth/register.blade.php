@extends('layouts.master')

@section('content')
<div class="container" style="">
    <div class="row justify-content-center" >
        <div class="col-md-8">
            <div class="card " >

                <div class="card-header text-center" style=" font-size: 30px;text-transform: uppercase;">
                {{ __('Formulari de Registre') }}  <i class="fa fa-address-card" style="color:DarkTurquoise;font-size:40px;"></i></div>
                <div class="card-body" >

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right"><i class="fa fa-user-o" aria-hidden="true"></i> {{ __('Nom d\'usuari') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" maxlength="10" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right"><i class="fa fa-envelope-o" aria-hidden="true"></i> {{ __('Correu Electrònic') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fa fa-key" aria-hidden="true"></i> {{ __('Contrasenya') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirma La Contrassenya') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Escola" class="col-md-4 col-form-label text-md-right">{{ __('Seleccion La teva Escola') }}</label>

                            <div class="col-md-6">
                            <select id="escola" class="form-control" name="escola"  required>
                                <option>Anicet de Pagès i de Puig</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group ">
                            <label for="user" class="col-md-4 col-form-label text-md-right">{{ __('Tipus D\'usuari') }}</label>

                            <input type="radio" id="Alumne" name="user" value="Alumne"
                                    checked>
                            <label for="Alumne">Alumne</label>

                            <input type="radio" id="Professor" name="user" value="Professor">
                            <label for="Professor">Professor</label>

                        </div>
                        <div class="form-group row mb-0">

                        <div class=" offset-md-4">
                        <label><input type="checkbox" id="cbox1" value="termes_politica"> He llegit i accepto <a href="http://127.0.0.1:8000/privacitat" target="_blank"> la política de privacitat </a> i <a href="http://127.0.0.1:8000/termes" target="_blank">  els termes</a>.</label><br>
                        </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-5 mt-2">
                                <button type="submit" id="submit" class="btn btn-primary" disabled>
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script src="{{ asset('Script/app.js') }}" defer></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
@endsection

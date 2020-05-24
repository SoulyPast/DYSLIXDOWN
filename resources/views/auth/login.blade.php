@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center d-flex justify-content-center">
        <div class="col-md-12">
            <div>

            </div>
            <div class="card">
                <div class="card-body row">
                <div class= "mb-4 col-md-6 mt-3" >
                <img src="https://image.freepik.com/free-vector/man-with-tablet-little-schoolgirl_107791-1187.jpg"class="rounded mx-auto d-block img-thumbnail" alt="Responsive image">
                </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group md-form row mt-3">

                            <label for="email" class="col-md-4 col-form-label text-md-right "><i class="fa fa-user prefix"></i> {{ __('Correu electrònic') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right"><i class="fa fa-lock prefix"></i> {{ __('Contrasenya') }}</label>

                            <div class="col-md-8">

                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-5 offset-md-6">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recorda\'m !') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row ">
                            <div class="col-md-5 offset-md-6">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar la sessió') }}
                                </button>
                                </div>
                                <div class="col-md-7 offset-md-4 mt-3">
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Has oblidat la teva contrasenya?') }}
                                    </a>
                                @endif
                                </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

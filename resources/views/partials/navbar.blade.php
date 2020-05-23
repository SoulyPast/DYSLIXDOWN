<nav class="navbar navbar-expand-lg  navbar-light bg-light static-top">
  <div class="container">
    <a class="navbar-brand" href="{{url('/')}}">
        <img src="{{ asset('Imatges/Logo/Logo.png') }}" alt="Logo"  class="img-responsive">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" class="d-flex flex-row-reverse link" id="navbarResponsive">
            @if(Auth::check())
                <ul class="navbar-nav ml-auto d-flex justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-dark link" href="{{url('/play')}}">
                            <i class="fa fa-play-circle-o"></i> Play
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link font-weight-bold text-dark link" href="{{url('/activitats')}}">
                           <i class="fa fa-list-alt"></i> Activitats
                        </a>
                    </li>
                    @if(Auth::user()->hasRole('professor'))
                    <li class="nav-item font-weight-bold ">
                        <a class="nav-link text-dark link" href="{{url('/LesMevesActivitats')}}">
                            <i class="fa fa-clipboard"></i> Les meves activitats
                        </a>
                    </li>
                    <li class="nav-item font-weight-bold ">
                        <a class="nav-link text-dark link" href="{{url('/activitats/create')}}">
                            <span>&#10010</span> Nueva Activitat
                        </a>
                    </li>
                    <li class="nav-item font-weight-bold ">
                        <a class="nav-link text-dark link" href="{{url('/valoracio')}}">
                            <i class="fa fa-file-text-o "></i> Resultats
                        </a>
                    </li>
                    @endif
                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle font-weight-bold text-dark" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class='fa fa-user'></i> {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item font-weight-bold" href="{{ url('/perfil') }}">
                                    <i class="fa fa-user-circle"></i> {{ __('Perfil') }}
                                    </a>
                                    <a class="dropdown-item font-weight-bold" id="logout" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out"></i>{{ __('Tancar Sessió') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>

                @endif
                @if(!Auth::check())
                <ul class="navbar-nav mr-auto  d-flex justify-content-end">
                </ul>
                <ul class="navbar-nav navbar-right d-flex justify-content-end">
                    <li class="nav-item">
                        <a href="{{  route('login') }}" class="btn btn-default"> Login </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{  route('register') }}" class="btn btn-default"> Registrar </a>
                    </li>
                </ul>
                @endif
            </div>
    </div>
</nav>
<link rel="stylesheet" href="{{ asset('/Styles/Activitats.css') }}">

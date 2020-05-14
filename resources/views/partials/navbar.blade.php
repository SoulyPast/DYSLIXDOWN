<nav class="navbar navbar-expand-lg  navbar-light bg-light static-top">
  <div class="container">
    <a class="navbar-brand" href="/">
        <img src="http://127.0.0.1:8000/Imatges/Logo/Logo.png" alt="Logo"  class="img-responsive">
        </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
            @if(Auth::check())
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/activitats')}}">
                            <span class="glyphicon glyphicon-list-alt"></span> Activitats
                        </a>
                    </li>
                    @if(Auth::user()->hasRole('professor'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/LesMevesActivitats')}}">
                            <span></span> Les meves activitats
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/activitats/create')}}">
                            <span>&#10010</span> Nueva Activitat
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/valoracio')}}">
                            <span></span> Resultats
                        </a>
                    </li>
                    @endif
                <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('/perfil') }}">
                                        {{ __('Perfil') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Tancar Sessió') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>

                            </li>

                @endif
                @if(!Auth::check())
                <ul class="navbar-nav mr-auto">
                </ul>
                <ul class="navbar-nav navbar-right">
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

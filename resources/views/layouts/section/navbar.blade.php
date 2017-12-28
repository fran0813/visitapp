<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            @yield('brand')
        </div>        

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul  class="nav navbar-nav">                
                <ul class="nav navbar-nav navbar-left"> 
                    <li><a href="/admin/informacionAgencia" style="margin-left: 2%;">Información Agencia</a></li>
                    <li><a href="/admin/informacionGeneral" style="margin-left: 2%;">Información General</a></li>
                    <li><a href="/admin/informacionCliente" style="margin-left: 2%;">Información Cliente</a></li>
                    <li><a href="/admin/informacionReferencia" style="margin-left: 2%;">Información Referencia</a></li>
                    <li><a href="/admin/informacionAvalista" style="margin-left: 2%;">Información Avalista</a></li>
                    <li><a href="/admin/resultadoVisita" style="margin-left: 2%;">Resultado visita</a></li>
                    <li><a href="/admin/acuerdoDePago" style="margin-left: 2%;">Acuerdo de pago</a></li>
                    <li><a href="/admin/comentariosDeLaVisita" style="margin-left: 2%;">Comentarios de la visita</a></li>

                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}" style="margin-left: 2%;">Login</a></li>
                    <li><a href="{{ route('register') }}" style="margin-left: 2%;">Register</a></li>
                @else
                    <li class="dropdown" style="margin-left: 2%;">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <ul class="dropdown-menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
                </ul>
            </ul>
        </div>
    </div>
</nav>


@section('navbar')
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">Menu<span class="caret"></span></a>

        <ul class="dropdown-menu">
            <li>
                <a href="/admin/">Inicio</a>
                <a href="/admin/informacionAgencia">Información Agencia</a>
                <a href="/admin/informacionGeneral">Información General</a>
                <a href="/admin/informacionCliente">Información Cliente</a>
                <a href="/admin/informacionReferencia">Información Referencia</a>
                <a href="/admin/informacionAvalista">Información Avalista</a>
                <a href="/admin/resultadoVisita">Resultado visita</a>
                <a href="/admin/acuerdoPago">Acuerdo de pago</a>
                <a href="/admin/comentarioVisita">Comentarios de la visita</a>
                <a href="/admin/firma">Firma</a>
            </li>
        </ul>
    </li>
	

    <!-- Authentication Links -->
    @guest
        <li><a href="{{ route('login') }}">Login</a></li>
        <li><a href="{{ route('register') }}">Register</a></li>
    @else
        <li class="dropdown">
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
@endsection
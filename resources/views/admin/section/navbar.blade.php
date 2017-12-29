@section('navbar')
	<li><a href="/admin/" style="margin-left: 2%;">Inicio</a></li>
    <li><a href="/admin/informacionAgencia" style="margin-left: 2%;">Información Agencia</a></li>
    <li><a href="/admin/informacionGeneral" style="margin-left: 2%;">Información General</a></li>
    <li><a href="/admin/informacionCliente" style="margin-left: 2%;">Información Cliente</a></li>
    <li><a href="/admin/informacionReferencia" style="margin-left: 2%;">Información Referencia</a></li>
    <li><a href="/admin/informacionAvalista" style="margin-left: 2%;">Información Avalista</a></li>
    <li><a href="/admin/resultadoVisita" style="margin-left: 2%;">Resultado visita</a></li>
    <li><a href="/admin/acuerdoPago" style="margin-left: 2%;">Acuerdo de pago</a></li>
    <li><a href="/admin/comentarioVisita" style="margin-left: 2%;">Comentarios de la visita</a></li>

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
@endsection
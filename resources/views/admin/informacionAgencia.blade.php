@if(auth()->user()->hasRole('Admin'))

    @extends('layouts.base')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/informacionAgencia') }}" style="width: 70%; height: 40%;">
            Información Agencia
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <form id="formInformacionAgencia">
                    <label class="control-label" for="nombreDeLaAgencia">Nombre de la agencia externa</label>
                    <input type="text" class="form-control" id="nombreDeLaAgencia" placeholder="Ingrese la agencia" required>
                    <label class="control-label" for="franja">Franja</label>
                    <input type="text" class="form-control" id="franja" placeholder="Ingrese la franja" required>
                    <label class="control-label" for="fecha">Fecha</label>
                    <input type="date" class="form-control" id="fecha" required>
                    <label class="control-label" for="ciudad">Ciudad</label>
                    <input type="text" class="form-control" id="ciudad" placeholder="Ingrese la ciudad" required>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">Continuar</button>
                </form>
            </div>          
        </div>
    </div>
    @endsection

    @section('javascript')
        <script src="{{ asset('js/admin/informacionAgencia.js') }}"></script>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
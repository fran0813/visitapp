@if(auth()->user()->hasRole('Admin'))

    @extends('layouts.base')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/informacionReferencia') }}" style="width: 70%; height: 40%;">
            Información General de los productos
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente"></p>
                <form id="formInformacionReferencia">
                    <label class="control-label" for="nombresApellidosReferencia">Nombres y Apellidos</label>
                    <input type="text" class="form-control" id="nombresApellidosReferencia" placeholder="Ingrese nombres y apellidos" required>
                    <label class="control-label" for="telefonoReferencia">N° de Teléfono</label>
                    <input type="number" class="form-control" id="telefonoReferencia" placeholder="Ingrese el teléfono" required>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%;">Continuar</button>
                </form>
            </div>          
        </div>
    </div>
    @endsection

    @section('javascript')
        <script src="{{ asset('js/admin/informacionReferencia.js') }}"></script>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
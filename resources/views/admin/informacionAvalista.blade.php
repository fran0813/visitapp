@if(auth()->user()->hasRole('Admin'))

    @extends('admin.index')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/informacionAvalista') }}" style="width: 70%; height: 40%;">
            Información Avalista
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente" style="display: none;"></p>
                <form id="formInformacionAvalista" style="display: none; margin-left: 15%; margin-right: 15%;">
                    <label class="control-label" for="codigoGarantia">Código de Garantia</label>
                    <input type="text" class="form-control" id="codigoGarantia" placeholder="Ingrese el código de garantia" required>
                    <label class="control-label" for="nombresApellidosAvalista">Nombres y apellidos</label>
                    <input type="text" class="form-control" id="nombresApellidosAvalista" placeholder="Ingrese los nombres y apellidos" required>
                    <label class="control-label" for="telefonoAvalista">N° de Teléfono</label>
                    <input type="number" class="form-control" id="telefonoAvalista" placeholder="Ingrese el teléfono" required>
                    <label class="control-label" for="ocupacion">Ocupación</label>
                    <input type="text" class="form-control" id="ocupacion" placeholder="Ingrese la ocupación" required>
                    <label class="control-label" for="observacion">Observación</label>
                    <textarea class="form-control" id="observacion" rows="3" style="resize: none;" placeholder="Ingrese la observación"></textarea>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%;">Continuar</button>
                </form>
            </div>          
        </div>
    </div>
    @endsection

    @section('javascript')
        <script src="{{ asset('js/admin/informacionAvalista.js') }}"></script>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
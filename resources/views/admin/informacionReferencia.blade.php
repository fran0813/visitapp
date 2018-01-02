@if(auth()->user()->hasRole('Admin'))

    @extends('admin.index')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/informacionReferencia') }}" style="height: 40%;">
            Información Referencia
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente" style="display: none; margin-left: 15%;"></p>
                <form id="formInformacionReferencia" style="display: none; margin-left: 15%; margin-right: 15%;">
                    <label class="control-label" for="#">Referencia</label>
                    <select id="referencia" class="form-control">
                        <option value="null">Seleccione la referencia</option>
                        <option value="personal">Personal</option>
                        <option value="familiar">Familiar</option>
                    </select>
                    <label class="control-label" for="nombresApellidosReferencia">Nombres y apellidos</label>
                    <input type="text" class="form-control" id="nombresApellidosReferencia" placeholder="Ingrese nombres y apellidos" required>
                    <label class="control-label" for="telefonoReferencia">N° de teléfono</label>
                    <input type="number" class="form-control" id="telefonoReferencia" placeholder="Ingrese el teléfono" pattern="[0-9]+" required>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">Continuar</button>
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
@if(auth()->user()->hasRole('Admin'))

    @extends('admin.index')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/informacionCliente') }}" style="width: 70%; height: 40%;">
            Información del cliente
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente" style="display: none; margin-left: 15%;"></p>
                <form id="formInformacionCliente" style="display: none; margin-left: 15%; margin-right: 15%;">
                    <label class="control-label" for="nombresApellidos">Nombres y apellidos</label>
                    <input type="text" class="form-control" id="nombresApellidos" placeholder="Ingrese los nombres y apellidos" required>
                    <label class="control-label" for="documentoIdentificacion">Documento de identificación</label>
                    <input type="number" class="form-control" id="documentoIdentificacion" placeholder="Ingrese el documento de identificación" pattern="[0-9]+" required>
                    <label class="control-label" for="correo">Correo electrónico</label>
                    <input type="email" class="form-control" id="correo" placeholder="Ingrese el correo" required>
                    <label class="control-label" for="celular">Celular</label>
                    <input type="number" class="form-control" id="celular" placeholder="Ingrese el celular" required pattern="[0-9]+">
                    <label class="control-label" for="direccion">Dirección de residencia</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Ingrese la dirección de residencia" required>
                    <label class="control-label" for="telefono">Telefono de residencia</label>
                    <input type="number" class="form-control" id="telefono" placeholder="Ingrese el teléfono de residencia" pattern="[0-9]+" required>
                    <label class="control-label" for="direccionOficiona">Dirección de oficina</label>
                    <input type="text" class="form-control" id="direccionOficiona" placeholder="Ingrese la dirección de oficina" required>
                    <label class="control-label" for="telefonoOficina">Telefono de oficina</label>
                    <input type="number" class="form-control" id="telefonoOficina" placeholder="Ingrese el teléfono de oficina" pattern="[0-9]+" required>
                    <h4 style="color: #383838">Dirección de mayor contacto</h4>
                    <label class="control-label" for="residencia">Residencia</label>                
                    <input type="radio" id="residencia" name="direccionDeMayorContacto" value="residencia" required>
                    <br>
                    <label class="control-label" for="oficina">Oficina</label>
                    <input type="radio" id="oficina" name="direccionDeMayorContacto" value="oficina" required>
                    <br>
                    <label class="control-label" for="direccionVisita">Dirección de visita</label>
                    <input type="text" class="form-control" id="direccionVisita" placeholder="Ingrese la dirección de visita" required>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%;">Continuar</button>
                </form>
            </div>          
        </div>
    </div>
    @endsection

    @section('javascript')
        <script src="{{ asset('js/admin/informacionCliente.js') }}"></script>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
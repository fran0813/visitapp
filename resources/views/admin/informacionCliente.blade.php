@if(auth()->user()->hasRole('Admin'))

    @extends('layouts.base')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/informacionCliente') }}" style="width: 70%; height: 40%;">
            Información del cliente
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente"></p>
                <form id="formInformacionCliente">
                    <label class="control-label" for="nombresApellidos">Nombres y Apellidos</label>
                    <input type="text" class="form-control" id="nombresApellidos" placeholder="Ingrese nombres y apellidos" required>
                    <label class="control-label" for="documentoIdentificacion">Documento de Identificación</label>
                    <input type="number" class="form-control" id="documentoIdentificacion" placeholder="Ingrese el documento de identificación" required>
                    <label class="control-label" for="correo">Correo Electronico</label>
                    <input type="email" class="form-control" id="correo" placeholder="Ingrese el correo" required>
                    <label class="control-label" for="celular">Celular</label>
                    <input type="number" class="form-control" id="celular" placeholder="Ingrese el celular" required>
                    <label class="control-label" for="direccion">Dirección de Residencia</label>
                    <input type="text" class="form-control" id="direccion" placeholder="Ingrese la dirección de residencia" required>
                    <label class="control-label" for="telefono">Telefono de Residencia</label>
                    <input type="number" class="form-control" id="telefono" placeholder="Ingrese el teléfono de residencia" required>
                    <label class="control-label" for="direccionOficiona">Dirección de Oficina</label>
                    <input type="text" class="form-control" id="direccionOficiona" placeholder="Ingrese la dirección de oficina" required>
                    <label class="control-label" for="telefonoOficina">Telefono de Oficina</label>
                    <input type="number" class="form-control" id="telefonoOficina" placeholder="Ingrese el teléfono de oficina" required>
                    <label class="control-label" for="#">Dirección de mayor contacto</label>
                    <br>
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
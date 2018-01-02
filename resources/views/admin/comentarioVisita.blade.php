@if(auth()->user()->hasRole('Admin'))

    @extends('admin.index')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/comentarioVisita') }}" style="height: 40%;">
            Comentario de la Visita
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente" style="display: none;"></p>
                <form id="formComentarioVisita" style="display: none; margin-left: 15%; margin-right: 15%;">
                    <label class="control-label" for="comentario">Comentario de la visita o descripción del inmueble</label>
                    <textarea id="comentario" class="form-control" rows="3" style="resize: none;" placeholder="Ingrese el comentario de la visita o descripción del inmueble"></textarea>
                    <h4 style="color: #383838">Efecto de la visita</h4>
                    <label class="control-label" for="noViveTrabaja">No vive / No trabaja</label>                
                    <input type="radio" id="noViveTrabaja" name="efectoVisita" value="noViveTrabaja" required>
                    <br>
                    <label class="control-label" for="promesaNegociacion">Promesa - Negociación</label>
                    <input type="radio" id="promesaNegociacion" name="efectoVisita" value="promesaNegociacion" required>
                    <br>
                    <label class="control-label" for="voluntadPago">Voluntad de pago</label>
                    <input type="radio" id="voluntadPago" name="efectoVisita" value="voluntadPago" required>
                    <br>
                    <label class="control-label" for="noAtendioVisita">No atendió la visita</label>
                    <input type="radio" id="noAtendioVisita" name="efectoVisita" value="noAtendioVisita" required>
                    <br>
                    <label class="control-label" for="remitidoSucursal">Remitido a sucursal</label>
                    <input type="radio" id="remitidoSucursal" name="efectoVisita" value="remitidoSucursal" required>
                    <br>
                    <label class="control-label" for="renuente">Renuente</label>
                    <input type="radio" id="renuente" name="efectoVisita" value="renuente" required>
                    <br>
                    <label class="control-label" for="cancelo">Ya Cancelo</label>
                    <input type="radio" id="cancelo" name="efectoVisita" value="cancelo" required>
                    <br>
                    <h4 style="color: #383838">Lugar inaccesible</h4>
                    <label class="control-label" for="inseguridad">Inseguridad</label>                
                    <input type="radio" id="inseguridad" name="motivo" value="inseguridad" required>
                    <br>
                    <label class="control-label" for="olaInvernal">Ola invernal</label>
                    <input type="radio" id="olaInvernal" name="motivo" value="olaInvernal" required>
                    <br>
                    <label class="control-label" for="otro">Otros</label>
                    <input type="radio" id="otro" name="motivo" value="otro" required>
                    <input type="text" id="otroMotivo" class="form-control" style="display: none;" placeholder="Ingrese el motivo">
                    <br>
                    <h4 style="color: #383838">Dirección inexistente</h4>
                    <label class="control-label" for="noEncontrada">No encontrada</label>                
                    <input type="radio" id="noEncontrada" name="direccionInexistente" value="noEncontrada" required>
                    <br>
                    <label class="control-label" for="incompleta">Incompleta</label>
                    <input type="radio" id="incompleta" name="direccionInexistente" value="incompleta" required>
                    <br>
                    <h4 style="color: #383838">Subrogación</h4>
                    <label class="control-label" for="fallecido">Fallecido</label>                
                    <input type="radio" id="fallecido" name="subrogacion" value="fallecido" required>
                    <br>
                    <label class="control-label" for="posibleNegociacion">Posible negociación</label>
                    <input type="radio" id="posibleNegociacion" name="subrogacion" value="posibleNegociacion" required>
                    <br>
                    <h4 style="color: #383838">Tipo de contacto</h4>
                    <label class="control-label" for="deudor">Deudor</label>                
                    <input type="radio" id="deudor" name="tipoContacto" value="deudor" required>
                    <br>
                    <label class="control-label" for="conyuge">Conyuge</label>
                    <input type="radio" id="conyuge" name="tipoContacto" value="conyuge" required>
                    <br>
                    <label class="control-label" for="codeudor">Codeudor</label>
                    <input type="radio" id="codeudor" name="tipoContacto" value="codeudor" required>
                    <br>
                    <label class="control-label" for="tercero">Tercero</label>
                    <input type="radio" id="tercero" name="tipoContacto" value="tercero" required>
                    <br>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">Guardar</button>
                </form>
            </div>          
        </div>
    </div>
    @endsection

    @section('javascript')
        <script src="{{ asset('js/admin/comentarioVisita.js') }}"></script>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
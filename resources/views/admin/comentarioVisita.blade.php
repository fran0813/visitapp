@if(auth()->user()->hasRole('Admin'))

    @extends('admin.index')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/comentarioVisita') }}" style="width: 70%; height: 40%;">
            Comentario de la Visita
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente" style="display: none;"></p>
                <form id="formComentarioVisita" style="display: none; margin-left: 15%; margin-right: 15%;">
                    <label class="control-label" for="comentario">Comentario de la Visita o Descripción del inmueble</label>
                    <textarea id="comentario" class="form-control" rows="3" placeholder="Ingrese el comentario de la visita o descripción del inmueble"></textarea>
                    <label class="control-label" for="#">Efecto de la visita</label>
                    <br>
                    <label class="control-label" for="noViveTrabaja">No vive / No Trabaja</label>                
                    <input type="radio" id="noViveTrabaja" name="efectoVisita" value="noViveTrabaja" required>
                    <br>
                    <label class="control-label" for="promesaNegociacion">Promesa - Negociación</label>
                    <input type="radio" id="promesaNegociacion" name="efectoVisita" value="promesaNegociacion" required>
                    <br>
                    <label class="control-label" for="voluntadPago">Voluntad de Pago</label>
                    <input type="radio" id="voluntadPago" name="efectoVisita" value="voluntadPago" required>
                    <br>
                    <label class="control-label" for="noAtendioVisita">No Atendió la Visita</label>
                    <input type="radio" id="noAtendioVisita" name="efectoVisita" value="noAtendioVisita" required>
                    <br>
                    <label class="control-label" for="remitidoSucursal">Remitido a Sucursal</label>
                    <input type="radio" id="remitidoSucursal" name="efectoVisita" value="remitidoSucursal" required>
                    <br>
                    <label class="control-label" for="renuente">Renuente</label>
                    <input type="radio" id="renuente" name="efectoVisita" value="renuente" required>
                    <br>
                    <label class="control-label" for="cancelo">Ya Cancelo</label>
                    <input type="radio" id="cancelo" name="efectoVisita" value="cancelo" required>
                    <br>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">Continuar</button>
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
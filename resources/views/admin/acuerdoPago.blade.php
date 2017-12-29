@if(auth()->user()->hasRole('Admin'))

    @extends('admin.index')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/acuerdoPago') }}" style="width: 70%; height: 40%;">
            Acuerdo de Pago
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente" style="display: none;"></p>
                <form id="formAcuerdoPago" style="display: none; margin-left: 15%; margin-right: 15%;">
                    <label class="control-label" for="#">Se Establecio un Acuerdo de Pago</label>
                    <br>
                    <label class="control-label" for="si">Si</label>                
                    <input type="radio" id="si" name="acuerdo" value="si" required>
                    <br>
                    <label class="control-label" for="no">No</label>
                    <input type="radio" id="no" name="acuerdo" value="no" required>
                    <br>
                    <label class="control-label" for="#">Acuerdo de Pago</label>
                    <br>
                    <label class="control-label" for="nDeProducto">N° de Producto</label>
                    <input type="text" class="form-control" id="nDeProducto" placeholder="Ingrese el n° de producto" required>
                    <label class="control-label" for="fechaCompromiso">Fecha de Compromiso</label>
                    <input type="date" class="form-control" id="fechaCompromiso" required>
                    <label class="control-label" for="vrPromesa">Vr Promesa</label>
                    <input type="text" class="form-control" id="vrPromesa" placeholder="Ingrese el vr promesa" required>
                    <label class="control-label" for="alternativa">Alternativas</label>
                    <textarea id="alternativa" class="form-control" rows="3" placeholder="Ingrese las alternativas"></textarea>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">Continuar</button>
                </form>
            </div>          
        </div>
    </div>
    @endsection

    @section('javascript')
        <script src="{{ asset('js/admin/acuerdoPago.js') }}"></script>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
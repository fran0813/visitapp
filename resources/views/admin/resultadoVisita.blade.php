@if(auth()->user()->hasRole('Admin'))

    @extends('admin.index')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/resultadoVisita') }}" style="width: 70%; height: 40%;">
            Resultado Visita
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente" style="display: none; margin-left: 15%;"></p>
                <form id="formResultadoVisita" style="display: none; margin-left: 15%; margin-right: 15%;">
                    <label class="control-label" for="#">Se Contacta con el titular</label>
                    <br>
                    <label class="control-label" for="si">Si</label>                
                    <input type="radio" id="si" name="contactaTitular" value="si" required>
                    <br>
                    <label class="control-label" for="no">No</label>
                    <input type="radio" id="no" name="contactaTitular" value="no" required>
                    <br>
                    <div id="noContacta" style="display: none;">
                        <label class="control-label" for="#">No Hubo Contacto con el titular, pero vive o trabaja Ahí</label>
                        <br>
                        <label class="control-label" for="si2">Si</label>                
                        <input type="radio" id="si2" name="noContactaTitular" value="si">
                        <br>
                        <label class="control-label" for="no2">No</label>
                        <input type="radio" id="no2" name="noContactaTitular" value="no">
                        <br>
                    </div>
                    <h4 style="color: #383838">Persona quien atiende la visita</h4>           
                    <label class="control-label" for="nombresApellidosVisita">Nombres y apellidos</label>                
                    <input class="form-control" type="text" id="nombresApellidosVisita" placeholder="Ingrese los nombres y apellidos" required>
                    <label class="control-label" for="parentesco">Parentesco</label>                
                    <input class="form-control" type="text" id="parentesco" placeholder="Ingrese el parentesco" required>
                    <h4 style="color: #383838">Observaciones</h4>             
                    <label class="control-label" for="actividadEconomica">Actividad economica actual del titular</label>  
                    <input class="form-control" type="number" id="actividadEconomica" placeholder="Ingrese la actividad economica actual del titular" required>
                    <label class="control-label" for="noPago">Motivo del NO PAGO</label>                
                    <input class="form-control" type="text" id="noPago" placeholder="Ingrese el motivo del no pago" required>
                    <label class="control-label" for="observacionesNoPago">Observaciones motivo del NO PAGO</label>
                    <textarea id="observacionesNoPago" class="form-control" style="resize: none;" rows="3" placeholder="Ingrese las observaciones del motivo del no pago"></textarea>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%;">Continuar</button>
                </form>
            </div>          
        </div>
    </div>
    @endsection

    @section('javascript')
        <script src="{{ asset('js/admin/resultadoVisita.js') }}"></script>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
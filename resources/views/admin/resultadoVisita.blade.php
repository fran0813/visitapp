@if(auth()->user()->hasRole('Admin'))

    @extends('layouts.base')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/resultadoVisita') }}" style="width: 70%; height: 40%;">
            Resultado Visita
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente"></p>
                <form id="formResultadoVisita">
                    <label class="control-label" for="#">Se Contacta con el Titular</label>
                    <br>
                    <label class="control-label" for="si">Si</label>                
                    <input type="radio" id="si" name="contactaTitular" value="si" required>
                    <br>
                    <label class="control-label" for="no">No</label>
                    <input type="radio" id="no" name="contactaTitular" value="no" required>
                    <br>
                    <div id="noContacta">
                        <label class="control-label" for="#">No Hubo Contacto con el Titular, Pero Vive o Trabaja Ahí</label>
                        <br>
                        <label class="control-label" for="si2">Si</label>                
                        <input type="radio" id="si2" name="noContactaTitular" value="si" required>
                        <br>
                        <label class="control-label" for="no2">No</label>
                        <input type="radio" id="no2" name="noContactaTitular" value="no" required>
                        <br>
                    </div>
                    <label class="control-label" for="#">Persona Quien Atiende la Visita</label> 
                    <br>               
                    <label class="control-label" for="nombresApellidosVisita">Nombres y Apellidos</label>                
                    <input class="form-control" type="text" id="nombresApellidosVisita" placeholder="Ingrese los nombres y apellidos" required>
                    <label class="control-label" for="parentesco">Parentesco</label>                
                    <input class="form-control" type="text" id="parentesco" placeholder="Ingrese el parentesco" required>
                    <label class="control-label" for="#">Observaciones</label> 
                    <br>               
                    <label class="control-label" for="actividadEconomica">Actividad Economica Actual del Titular</label>            
                    <input class="form-control" type="number" id="actividadEconomica" placeholder="Ingrese la actividad economica actual del titular" required>
                    <label class="control-label" for="noPago">Motivo del NO PAGO</label>                
                    <input class="form-control" type="text" id="noPago" placeholder="Ingrese el motivo del no pago" required>
                    <label class="control-label" for="observacionesNoPago">Observaciones Motivo del NO PAGO</label>                
                    <input class="form-control" type="text" id="observacionesNoPago" placeholder="Ingrese las observaciones del motivo del no pago" required>
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
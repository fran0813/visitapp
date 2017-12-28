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
                    <label class="control-label" for="residencia">Si</label>                
                    <input type="radio" id="si" name="contactaTitular" value="residencia" required>
                    <br>
                    <label class="control-label" for="oficina">No</label>
                    <input type="radio" id="no" name="contactaTitular" value="oficina" required>
                    <br>
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
@if(auth()->user()->hasRole('Admin'))

    @extends('layouts.base')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/informacionGeneral') }}" style="width: 70%; height: 40%;">
            Información Referencia
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente"></p>
                <form id="formInformacionGeneral">
                    <label class="control-label" for="codAlivio">Cod. Alivio</label>
                    <input type="text" class="form-control" id="codAlivio" placeholder="Ingrese el cod. Alivio" required>
                    <label class="control-label" for="obligacionN">Obligación n°</label>
                    <input type="number" class="form-control" id="obligacionN" placeholder="Ingrese la obligacion n°" required>
                    <label class="control-label" for="fechaDeDesembolso">Fecha de Desembolso</label>
                    <input type="date" class="form-control" id="fechaDeDesembolso" required>
                    <label class="control-label" for="saldoCapital">Saldo a Capital</label>
                    <input type="number" class="form-control" id="saldoCapital" placeholder="Ingrese el saldo a capital" required>
                    <label class="control-label" for="saldoTotal">Saldo Total</label>
                    <input type="number" class="form-control" id="saldoTotal" placeholder="Ingrese el saldo total" required>
                    <label class="control-label" for="etapaSapro">Etapa Sapro</label>
                    <input type="text" class="form-control" id="etapaSapro" placeholder="Ingrese la etapa sapro" required>
                    <label class="control-label" for="invBienesINIC">Inv Bienes INIC</label>
                    <input type="text" class="form-control" id="invBienesINIC" placeholder="Ingrese el cod. Alivio" required>
                    <label class="control-label" for="embargo">Embargo</label>
                    <input type="text" class="form-control" id="embargo" placeholder="Ingrese el cod. Alivio" required>
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">Continuar</button>
                </form>
            </div>          
        </div>
    </div>
    @endsection

    @section('javascript')
        <script src="{{ asset('js/admin/informacionGeneral.js') }}"></script>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
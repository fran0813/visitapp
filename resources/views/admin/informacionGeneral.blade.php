@if(auth()->user()->hasRole('Admin'))

    @extends('admin.index')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/admin/informacionGeneral') }}" style="width: 70%; height: 40%;">
            Información General
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente" style="display: none; margin-left: 15%;"></p>
                
                <div id="myCarousel" class="carousel slide" style="padding-bottom: 10%; display: none;">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active" style="background-color: #757575"></li>
                        <li data-target="#myCarousel" data-slide-to="1" style="background-color: #757575"></li>
                        <li data-target="#myCarousel" data-slide-to="2" style="background-color: #757575"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                             <form id="formInformacionGeneral1" style="margin-left: 15%; margin-right: 15%; margin-bottom: 10%;">
                                <label class="control-label" for="codAlivio">Codigo alivio</label>
                                <input type="text" class="form-control" id="codAlivio" placeholder="Ingrese el codigo alivio" required>
                                <label class="control-label" for="obligacionN">Obligación n°</label>
                                <input type="number" class="form-control" id="obligacionN" placeholder="Ingrese la obligación n°" pattern="[0-9]+" min="0" required>
                                <label class="control-label" for="fechaDeDesembolso">Fecha de desembolso</label>
                                <input type="date" class="form-control" id="fechaDeDesembolso" required>
                                <label class="control-label" for="saldoCapital">Saldo a capital</label>
                                <input type="number" class="form-control" id="saldoCapital" placeholder="Ingrese el saldo a capital" pattern="[0-9]+" required>
                                <label class="control-label" for="saldoTotal">Saldo total</label>
                                <input type="number" class="form-control" id="saldoTotal" placeholder="Ingrese el saldo total" pattern="[0-9]+" required>
                                <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">Continuar</button>
                            </form>
                        </div>

                        <div class="item">
                            <form id="formInformacionGeneral2" style="margin-left: 15%; margin-right: 15%; margin-bottom: 10%;">
                                <label class="control-label" for="diasMora">Días de mora</label>
                                <input type="number" class="form-control" id="diasMora" placeholder="Ingrese los dias de mora" pattern="[0-9]+" required>
                                <label class="control-label" for="VrIntMora">Valor intereses mora</label>
                                <input type="number" class="form-control" id="VrIntMora" placeholder="Ingrese el vr int mora" pattern="[0-9]+" required>
                                <label class="control-label" for="VrIntCorrientes">Valor intereses corrientes</label>
                                <input type="number" class="form-control" id="VrIntCorrientes" placeholder="Ingrese el vr int corrientes" pattern="[0-9]+" required>
                                <label class="control-label" for="VrSeguros">Valor seguros</label>
                                <input type="number" class="form-control" id="VrSeguros" placeholder="Ingrese el vr seguros" pattern="[0-9]+" required>
                                <label class="control-label" for="VrGac">Valor GAC</label>
                                <input type="number" class="form-control" id="VrGac" placeholder="Ingrese el vr gac" pattern="[0-9]+" required>
                                <label class="control-label" for="calificacion">Calificación</label>
                                <input type="text" class="form-control" id="calificacion" placeholder="Ingrese la calificación" required>
                                <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">Continuar</button>
                            </form>
                        </div>

                        <div class="item">
                            <form id="formInformacionGeneral3" style="margin-left: 15%; margin-right: 15%; margin-bottom: 10%;">
                                <label class="control-label" for="etapaSapro">Etapa sapro</label>
                                <input type="text" class="form-control" id="etapaSapro" placeholder="Ingrese la etapa sapro" required>
                                <label class="control-label" for="invBienesINIC">Inv bienes INIC</label>
                                <input type="text" class="form-control" id="invBienesINIC" placeholder="Ingrese el inv bienes inic" required>
                                <label class="control-label" for="embargo">Embargo</label>
                                <input type="text" class="form-control" id="embargo" placeholder="Ingrese el embargo" required>
                                <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">Continuar</button>
                            </form>
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev" style="background-image: none;">
                        <span class="fa fa-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next" style="background-image: none;">
                        <span class="fa fa-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
                               
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
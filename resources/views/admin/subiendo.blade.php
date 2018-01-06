@if(auth()->user()->hasRole('Admin'))

    @extends('admin.index')

    @section('brand')
        <a class="navbar-brand" href="#">
            Subiendo datos
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <p id="siguiente" style="display: none;"></p>
                <form id="otro" style="display: none; margin-left: 15%; margin-right: 15%;" class="text-center">
                    <h1>Inicio</h1>           
                    <button type="submit" class="btn btn-success center-block" style="margin-top: 2%; margin-bottom: 5%;">volver</button>
                </form>
            </div>          
        </div>
    </div>
    @endsection

    @include('admin.modal.cargar')

    @section('javascript')
        <script src="{{ asset('js/admin/subiendo.js') }}"></script>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
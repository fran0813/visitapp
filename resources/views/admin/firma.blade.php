@if(auth()->user()->hasRole('Admin'))
   <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'VISITAPP') }}</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}" >
        <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}" >
        {{-- Css --}}
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body onload="startup();comenzar();">

        <p id="siguiente" style="display: none; margin-left: 15%;"></p>
        <form id="formFirma">
            <canvas id="canvas" width="600" height="500" style="border: 1px solid  #000; box-shadow: 2px 2px 10px #333;"></canvas>
            <div class="text-center" style="margin-top: 2%; margin-bottom: 5%;">                
                <button type="submit" class="btn btn-success">Guardar</button>
                <button class="btn btn-info" onclick="volver();">Volver</button>
                <button class="btn btn-danger" onclick="borrar();">Borrar</button>
            </div>
            <img src="" id="fileImg" style="display: none;">
        </form>

        <div class="text-center" style="margin-top: 10%">
            <form id="firma" method="POST" action='/admin/firmaAlmacenar' enctype="multipart/form-data" style="display: none;">
                <label for="#">Por favor ingrese el archivo</label>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="file" name="file" class="form-control-file center-block">
                <button type="submit" class="btn btn-success">Guardar</button>
            </form>
        </div> 

        <!-- jQuery -->
        <script src="{{ asset('jquery/jquery.min.js') }}"></script>
        <!-- Bootstrap Core JavaScript -->
        <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- Scripts -->
        <script src="{{ asset('js/admin/navbar.js') }}"></script>
        <script src="{{ asset('js/admin/firma.js') }}"></script>
    </body>
    </html>
@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif


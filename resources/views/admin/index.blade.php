@if(auth()->user()->hasRole('Admin'))

    @extends('layouts.base')

    @section('brand')
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'VISITAAP') }}
        </a>
    @endsection

    @section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">Referencia</div>          
        </div>
    </div>
    @endsection

@else
    <div class="col-md-12 col-ls-12 col-sm-12 text-center">
        <h1>No tiene permisos para ver esta página</h1>
    </div>
@endif
@extends('admin.layout')

@section('conteudo')
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center py-4">
            <div class="col-lg-6 col-7">
                <h6 class="h2 text-white d-inline-block mb-0">Províncias</h6>
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="ni ni-pin-3"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Mapa</a></li>
                    <li class="breadcrumb-item"><a href="#">Listagem</a></li>
                </ol>
                </nav>
            </div>
            </div>
        </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
        <div class="col">
            <div class="card border-0">
            <div id="map-default" class="map-canvas" data-lat="40.748817" data-lng="-73.985428" style="height: 600px;"></div>
            </div>
        </div>
        </div>
        <!-- Footer -->
        @include("admin.includes.footer")
    </div>
@endsection
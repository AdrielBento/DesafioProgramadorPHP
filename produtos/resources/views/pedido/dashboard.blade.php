@extends('layout.app')

@section('content')
    <div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Dashboard</h3>
        </div>
    </div>
    <div class="row">
            <div class="col-lg-6">
                <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase">Produtos Pedidos</span>
                    <h6 class="stats-small__value count my-3">{{$dashs["produtosPedidos"]}}</h6>
                    </div>
                    <div class="stats-small__data">
                    </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-1"></canvas>
                </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="stats-small stats-small--1 card card-small">
                <div class="card-body p-0 d-flex">
                    <div class="d-flex flex-column m-auto">
                    <div class="stats-small__data text-center">
                        <span class="stats-small__label text-uppercase"> Numero de Pedidos </span>
                        <h6 class="stats-small__value count my-3">{{$dashs["pedidos"]}}</h6>
                    </div>
                    <div class="stats-small__data">
                    </div>
                    </div>
                    <canvas height="120" class="blog-overview-stats-small-2"></canvas>
                </div>
                </div>
            </div>
        </div>
    </div>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
    <script defer src="https://unpkg.com/shards-ui@latest/dist/js/shards.min.js"></script>
    <script defer  src="https://cdnjs.cloudflare.com/ajax/libs/Sharrre/2.0.1/jquery.sharrre.min.js"></script>
    <script defer  src="{{ asset('js/shards-dashboards.1.1.0.min.js')}}"></script>
    <script defer  src="{{ asset('js/app-blog-overview.1.1.0.js')}}"></script>
@endsection

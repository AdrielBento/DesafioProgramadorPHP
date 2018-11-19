<!DOCTYPE html>
<html class="no-js h-100" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title></title>
    @include('layout/head')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<body class="h-100">
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
                @include('layout/sidebar')
            </aside>
            <!-- End Sidebar -->
            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                <!-- Navbar -->
                @include('layout/navbar')
                <!-- END Navbar -->
                <div class="main-content-container container-fluid px-4">
                    <!-- Page Header -->
                    <div class="page-header row no-gutters py-4">
                        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                            <span class="text-uppercase page-subtitle">Overview</span>
                            <h3 class="page-title">Produto</h3>
                        </div>
                    </div>
                    <!-- End Page Header -->
                    <!-- Content -->
                    <div class="row">
                        @yield('content')
                    </div>

                </div>
            </main>
        </div>
    </div>

   @include('layout/scripts')
   <script  src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
   <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
   <script src="js/cadastroProduto.js"></script>
</body>
</html>


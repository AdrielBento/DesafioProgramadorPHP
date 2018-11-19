@extends('layout.app')

@section('content')
<!DOCTYPE html>
<html class="no-js h-100" lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Produto</title>
    @extends('layout.sidebar')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
</head>
<body class="h-100">
   <div class="container-fluid">
      <div class="row">
        <!-- Sidebar -->
        <aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
            @extends('layout.sidebar')
        </aside>
        <!-- End Sidebar -->
        <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
          <!-- Navbar -->
          @extends('layout.navbar')
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
              <div class="col-lg-6">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Gerencia Produto</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item p-3">
                      <div class="row">
                        <div class="col">
                          <form id="addProduto">
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="feFirstName">Nome</label>
                                <input type="text" class="form-control" id="nome" required name="nome" placeholder="nome">
                              </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                  <label for="peso">Peso</label>
                                  <input type="text" class="form-control" name="peso" required id="peso" placeholder="Peso">
                               </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-12">
                                <label for="descricao">Descricao</label>
                                <textarea class="form-control" name="descricao" id="descricao"  required rows="5">Descricao do produto</textarea>
                              </div>
                            </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                              <button class="btn btn-accent mr-1" type="submit" >Salvar</button>
                              <button class="btn btn-outline-danger" id="cancel-update-produto" type="button" style="display:none">Cancelar</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Produtos</h6>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                          <th scope="col" class="border-bottom-0">Nome</th>
                          <th scope="col" class="border-bottom-0">SKU</th>
                          <th scope="col" class="border-bottom-0">Descricao</th>
                          <th scope="col" class="border-bottom-0">Preco</th>
                        </tr>
                      </thead>
                      <tbody>

                      @foreach ($produtos as $produto)
                         <tr>
                            <td id="produto-nome-{{$produto->id}}">{{$produto->nome}}</td>
                            <td id="produto-categoria-{{$produto->id}}">{{$produto->sku}}</td>
                            <td id="produto-peso-{{$produto->id}}">{{$produto->descricao}}</td>
                            <td>
                                <span class="produto-remove pointer" data-id="${p.id}">
                                <i class="icon-red fas fa-trash-alt"></i>
                                </span>
                                <span class="produto-update pointer" data-id="${p.id}">
                                <i class="fas fa-pen"></i>
                                </span>
                            </td>
                        </tr>

                        @endforeach

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </main>
      </div>
    </div>
    @yield('scripts')
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/noty/3.1.4/noty.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/cadastroProduto.js"></script>
</body>
</html>

@stop

@extends('layout.app')

@section('content')
<div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Produtos</h3>
        </div>
    </div>
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
                    <input type="hidden" id="token" name="_token"  value="{{csrf_token() }}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" required name="nome" maxlength="100" placeholder="nome">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="sku">SKU</label>
                            <input type="text" class="form-control" id="sku" required name="sku" placeholder="SKU" maxlength="10">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="preco">Preço</label>
                            <input type="text" class="form-control" name="preco" required id="preco" placeholder="00.00">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                        <label for="descricao">Descricao</label>
                        <textarea class="form-control" name="descricao" id="descricao"  required rows="5"></textarea>
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
                <th scope="col" class="border-bottom-0">Preco</th>
                <th scope="col" class="border-bottom-0">Ações</th>
            </tr>
            </thead>
            <tbody>

            @foreach ($produtos as $produto)
            <tr>
                <td id="produto-nome-{{$produto->id}}">{{$produto->nome}}</td>
                <td id="produto-sku-{{$produto->id}}">{{$produto->sku}}</td>
                <td id="produto-preco-{{$produto->id}}">{{$produto->preco}}</td>
                <td>
                    <span class="produto-remove pointer" data-id="{{$produto->id}}">
                    <i class="icon-red fas fa-trash-alt"></i>
                    </span>
                    <span class="produto-update pointer" data-id="{{$produto->id}}">
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

@stop

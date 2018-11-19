@extends('layout.app')

@section('content')
<div class="page-header row no-gutters py-4">
        <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
            <span class="text-uppercase page-subtitle">Overview</span>
            <h3 class="page-title">Pedido</h3>
        </div>
    </div>
<div class="row">
    <div class="col-lg-6">
    <div class="card card-small mb-4">
        <div class="card-header border-bottom">
        <h6 class="m-0">Efetuar pedido</h6>
        </div>
        <ul class="list-group list-group-flush">
        <li class="list-group-item p-3">
            <div class="row">
            <div class="col">
                <form id="efetuaPedido">
                    <input type="hidden" id="token" name="_token"  value="{{csrf_token() }}">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="produto">Realiza Pedido</label>
                            <select id="produto" name="produto" class="form-control">
                                <option selected disabled>Selecione...</option>
                                @foreach ($produtos as $produto)
                                    <option value="{{$produto->id}}">{{$produto->nome}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="quantidade">Quantidade</label>
                            <input type="number" class="form-control" id="quantidade" name="quantidade">
                        </div>
                        <div class="form-group col-md-2">
                            <label for="quantidade">Add</label>
                            <button id="addPedido" class="btn btn-success mr-1" type="button" ><i class="fas fa-plus"></i></button>
                            <button id="updatePedido" style="display:none" class="btn btn-warning mr-1" type="button" ><i class="fas fa-pen"></i></button>

                        </div>
                    </div>

                    <div class="form-row">
                        <button class="btn btn-accent mr-1" type="submit" >Efetuar Pedido</button>
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
            <h6 class="m-0">Itens do Pedido</h6>
            </div>
            <div class="card-body p-0 pb-3 text-center">
            <table class="table mb-0">
                <thead class="bg-light">
                <tr>
                    <th scope="col" class="border-bottom-0">Nome</th>
                    <th scope="col" class="border-bottom-0">Quantidade</th>
                    <th scope="col" class="border-bottom-0">Preço</th>
                    <th scope="col" class="border-bottom-0">Ações</th>
                </tr>
                </thead>
                <tbody>
                </tbody>
                <tfoot>
                    <tr>
                        <th scope="col" class="border-bottom-0">Total:</th>
                        <th scope="col" class="border-bottom-0"></th>
                        <th scope="col" class="border-bottom-0"></th>
                        <th scope="col" id="total" class="border-bottom-0"></th>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
    </div>
</div>
@stop

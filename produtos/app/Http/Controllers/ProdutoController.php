<?php

namespace produtos\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use produtos\Produto;
use Validator;
use produtos\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller{


    public function addProduto(ProdutoRequest $request){
        Produto::create($request->all());
        $produto->save();
    }

    public function getProdutos(){
        $produtos = Produto::all();
        return view('produto.listagem')->withProdutos($produtos);
    }

    public function getProduto($id){
        $produto = Produto::find($id);
    }

    public function updateProduto(ProdutoRequest $request){

    }

    public function removeProduto(ProdutoRequest $request){

    }




}

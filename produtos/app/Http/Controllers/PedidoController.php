<?php

namespace produtos\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Request;
use produtos\Produto;
use Validator;
use DB;
// use estoque\Http\Requests\ProdutoRequest;

class ProdutoController extends Controller{


    public function addPedido(PedidoRequest $request){

        $params = $request->all();
        $dataAtual = new DateTime();
        $itensPedido = $idsProdutos = Array();

        foreach ($params as $key => $value) {

        }

        $precosProdutos = DB::table("tb_produto")->select("id,preco")->whereIn('id', [$idsProdutos])->get();

        $total = array_reduce($precosProdutos, function($preco, $produto) {
            $preco += $produto['preco'];
            return $preco;
        });


        try {

            $idPedido = DB::table("tb_pedido")->insertGetId(["total"=>$total,"data"=>$dataAtual]);

            foreach ($variable as $key => $value) {
                $itensPedido[] = ["idProduto"=>$value,"idPedido"=>$idPedido,"quantidade"=>$value];
            }

            DB::table("tb_itens_pedido")->insert([$itensPedido]);
        } catch (\Throwable $th) {

        }
        
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




}

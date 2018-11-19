<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;
use App\Pedido;

use Validator;

class PedidoController extends Controller{


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

    public function index(){
        $produtos = Produto::all();
        return view('pedido.index')->withProdutos($produtos);
    }

}

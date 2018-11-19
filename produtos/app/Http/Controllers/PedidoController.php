<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;
use App\Pedido;

use Validator;

class PedidoController extends Controller{


    public function addPedido(Request $request){

        $params = $request->all();
        $dados = $params["data"];
        $dataAtual = new \DateTime();
        $itensPedido = $idsProdutos = Array();
        $total = intval($params["total"]);

        try {

            DB::beginTransaction();

            $idPedido = DB::table("tb_pedido")->insertGetId(["total"=>$total,"dataPedido"=>$dataAtual]);

            foreach ($dados as $key) {
                if($key["name"] == "pedido"){
                    $itensPedido[] = ["idProduto"=>$key["value"]["idProduto"],"idPedido"=>$idPedido,"quantidade"=>$key["value"]["quantidade"]];
                }
            }

            DB::table("tb_itens_pedido")->insert($itensPedido);

            DB::commit();
            return response()->json(['status' => true]);

        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['status' => false,"message"=> $th->getMessage()]);
        }
    }

    public function index(){
        $produtos = Produto::all();
        return view('pedido.index')->withProdutos($produtos);
    }

}

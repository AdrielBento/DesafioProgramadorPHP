<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Produto;
use App\Http\Requests\ProdutoRequest;
use Validator;

class ProdutoController extends Controller{


    public function addProduto(ProdutoRequest $request){
        $produto = new Produto($request->all());
        $produto->save();
        $idProduto = $produto->id;
        return response()->json(['status' => true,'idProduto'=> $idProduto]);
    }

    public function getProdutos(){
        $produtos = Produto::all();
        return view('produto.gerenciaProdutos')->withProdutos($produtos);
    }

    public function getProduto($id){
        $produto = Produto::find($id);
        return response()->json(['status' => true,'produto'=>$produto]);
    }

    public function update(ProdutoRequest $request){

         $params = $request->all();
         Produto::where('id',$params['id'])
                ->update(['nome'=>$params['nome'],'sku'=>$params['sku'],'descricao'=>$params['descricao'],'preco'=>$params['preco']]);

           return response()->json(['status' => true]);
    }

    public function remove($id){

        $produto = Produto::find($id);

        try {
            // Não se deleta produtos que já estejam em algum pedido
            $produto->delete();
            return response()->json(['status' => true]);
        } catch (\Throwable $th) {

            return response()->json(['status' => false,'message'=>$th->getMessage()]);
        }

    }




}

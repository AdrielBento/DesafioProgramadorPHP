<?php

namespace estoque\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome'=> 'required|min:1',
            'descricao'=> 'required|max:255|min:1',
            'preco'=> 'required|min:numeric',
            'sku'=> 'required|max:10'
        ];
    }

    public function messagens(){
        return[
            'required' => 'O :attribute é obrigatorio'
        ];


    }
}

<?php

namespace App\Http\Requests;

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
            'nome'=> 'required',
            'descricao'=> 'required',
            'preco'=> 'required',
            'sku'=> 'required'
        ];
    }

    public function messagens(){
        return[
            'required' => 'O :attribute é obrigatorio'
        ];
    }
}

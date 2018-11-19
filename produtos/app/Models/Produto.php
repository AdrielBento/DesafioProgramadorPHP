<?php

namespace estoque;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'tb_produto';
    public $timestamps = false;
    protected $fillable = array('SKU','nome','descricao','preco');
}

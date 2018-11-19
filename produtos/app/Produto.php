<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'tb_produto';
    public $timestamps = false;
    protected $fillable = array('id','sku','nome','descricao','preco');
}

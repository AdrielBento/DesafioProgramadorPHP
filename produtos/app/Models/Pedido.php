<?php

namespace produtos;

use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    protected $table = 'tb_pedido';
    public $timestamps = false;
    protected $fillable = array(,'total','dataPedido');
}

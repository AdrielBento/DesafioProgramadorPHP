<?php

Route::get('/produtos', 'ProdutoController@getProdutos');
Route::get('/pedido', 'PedidoController@index');

Route::get('/produtos/remove/{id}', 'ProdutoController@remove')->where('id', '[0-9]+');
Route::get('/produtos/getProduto/{id}', 'ProdutoController@getProduto')->where('id', '[0-9]+');
Route::post('/produtos/new', 'ProdutoController@addProduto');
Route::post('/produtos/update', 'ProdutoController@update');




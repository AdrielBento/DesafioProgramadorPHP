<?php

Route::get('/produtos', 'ProdutoController@getProdutos');
Route::get('/produtos/remove/{id}', 'ProdutoController@remove')->where('id', '[0-9]+');
Route::post('/produtos/getProduto', 'ProdutoController@getProduto');
Route::post('/produtos/new', 'ProdutoController@addProduto');
Route::post('/produtos/update', 'ProdutoController@update');




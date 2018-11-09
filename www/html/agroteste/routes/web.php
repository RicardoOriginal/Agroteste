<?php


Route::get('/painel/pessoas/testes', 'Painel\PessoaController@tests');
Route::resource('/painel/pessoas', 'Painel\PessoaController');

Route::group(['namespace' => 'Site'], function (){
   Route::get('/categoria/{id?}', 'SiteController@categoriaOp');
    Route::get('/cliente/{id}', 'SiteController@cliente');
    Route::get('/contato', 'SiteController@contato');
    Route::get('/', 'SiteController@index'); 
});


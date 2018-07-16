<?php

//Grupo dos administradores
Route::group(['middleware' => ['auth'],'namespace' => 'Admin','prefix' => 'admin' ],function(){
    
    $this->post('confirm-transfer', 'BalanceController@confirmTransfer')->name('confirm.transfer');
    $this->get('transfer', 'BalanceController@transfer')->name('balance.transfer');


    $this->post('withdrawn', 'BalanceController@withdrawnStore')->name('withdrawn.store');
    $this->get('withdrawn', 'BalanceController@withdrawn')->name('balance.withdrawn');
    Route::post('deposit','BalanceController@depositStore')->name('deposit.store');
    Route::get('deposit','BalanceController@deposit')->name('balance.deposit');
    Route::get('balance','BalanceController@index')->name('admin.balance');
    Route::get('/','AdminController@index')->name('admin.home');
});


Route::get('/','Site\SiteController@index')->name('home');

/*
Route::group(['namespace'=>'Site'],function(){
    Route::get('/categoria2/{id?}','SiteController@categoriaOp');
    Route::get('/categoria/{id}','SiteController@categoria');
    Route::get('/contato','SiteController@contato');
    Route::get('/','SiteController@index');
});
*/

Auth::routes();
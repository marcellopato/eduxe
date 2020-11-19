<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/nova-escola', 'SchoolController@create')->name('nova.escola');
    //pega os dados da Receita
    Route::post('getCNPJ', 'CNPJController@getCNPJ');
    Route::post('getCPF', 'CPFController@getCPF');
});

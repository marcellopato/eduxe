<?php
Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/nova-escola', 'SchoolController@create')->name('school.create');
    Route::post('/cadastra-escola', 'SchoolController@store')->name('school.store');
    Route::get('/edit-escola/{id}', 'SchoolController@edit')->name('school.edit');
    Route::post('/atualiza-escola/{id}', 'SchoolController@update')->name('school.update');
    Route::post('getCNPJ', 'CNPJController@getCNPJ');
    Route::get('cep', 'CEPController@index');
});
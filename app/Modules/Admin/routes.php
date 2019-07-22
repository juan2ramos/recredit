<?php

Route::get('/usuarios/', 'UserController@search')->name('users.search');
Route::get('/usuario-sesion/{user}', 'UserSessionController')->name('userSession');
Route::get('/', 'UserController@index')->name('dashboard');
Route::post('/assigned/{credit}', 'CreditController@assigned')->name('assigned');

Route::get('/codigo-usuario/{user}','CodeRequestController')->middleware('can:analyst');

Route::resource('usuarios', 'UserController')
    ->names('usersAdmin')
    ->parameters(['usuarios' => 'user']);

Route::resource('creditos', 'CreditController')
    ->names('creditsAdmin')
    ->parameters(['creditos' => 'credit'])
    ->middleware('can:analyst');

Route::resource('tiendas', 'PointsController')
    ->names('points')
    ->parameters(['tiendas' => 'point']);

Route::resource('files', 'FileController')
    ->names('filesAdmin');





<?php

Route::get('/usuarios/', 'UserController@search')->name('users.search');
Route::get('/usuario-sesion/{user}', 'UserSessionController')->name('userSession');
Route::get('/', 'UserController@index')->name('dashboard');

Route::resource('usuarios', 'UserController')
    ->names('usersAdmin')
    ->parameters(['usuarios' => 'user']);

Route::resource('creditos', 'CreditController')
    ->names('creditsAdmin')
    ->parameters(['creditos' => 'credit']);

Route::resource('tiendas', 'PointsController')
    ->names('points')
    ->parameters(['tiendas' => 'point']);


Route::resource('sliders', 'SliderController');





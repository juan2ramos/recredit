<?php

Route::get('/usuarios/', 'UserController@search')->name('users.search');
Route::get('/usuario-sesion/{user}', 'UserSessionController')->name('userSession');
Route::get('/', 'UserController@index')->name('dashboard');
Route::post('/assigned/{credit}', 'CreditController@assigned')->name('assigned');

Route::get('/codigo-usuario/{user}','CodeRequestController')->middleware('can:analyst');
Route::get('/reconsideration/{user}','ReconsiderationController');

Route::resource('usuarios', 'UserController')
    ->names('usersAdmin')
    ->parameters(['usuarios' => 'user']);

Route::put('user-updateUserAdmin/{user}','UserController@updateAdmin')->name('updateAdmin');

Route::resource('creditos', 'CreditController')
    ->names('creditsAdmin')
    ->parameters(['creditos' => 'credit'])
    ->middleware('can:analyst');

Route::resource('tiendas', 'PointsController')
    ->names('points')
    ->parameters(['tiendas' => 'point']);

Route::resource('files', 'FileController')
    ->names('filesAdmin');

Route::resource('ciudades', 'CityController')
    ->names('cities')
    ->parameters(['ciudades' => 'city']);


Route::post('DownloadExcel', 'DownloadExcel');

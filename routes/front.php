<?php


use App\User;

Auth::routes(['register' => false]);
Route::view('/', 'front.home')->name('home');
Route::view('/administrador', 'front.adminTemp')->name('adminTemp');
Route::view('preguntas-frecuentes', 'front.faq')->name('faq');
Route::get('cerrar-sesión', 'Auth\LoginController@logout')->name('logout');

Route::get('pusher', function () {

});



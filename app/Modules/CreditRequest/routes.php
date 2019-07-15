<?php

Route::resource('solicitud-creditos', 'UserController')
    ->names('users')
    ->parameters(['solicitud-creditos' => 'user'])
    ->except(['show', 'create', 'destroy']);


Route::middleware(['auth', 'withoutCredit'])->group(function () {

    Route::resource('datos-contacto', 'ClientController')
        ->names('clients')
        ->parameters(['datos-contacto' => 'client'])
        ->except(['show', 'create', 'destroy']);
});



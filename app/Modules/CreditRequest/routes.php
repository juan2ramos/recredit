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

    Route::resource('referencias-personales', 'ReferenceController')
        ->names('references')
        ->parameters(['referencias-personales' => 'user'])
        ->except(['show', 'create', 'destroy']);

    Route::resource('archivos', 'FileController')
        ->names('files')
        ->parameters(['archivos' => 'file'])
        ->except(['show', 'create',]);

    Route::post('credit-finish', 'CreditController')->name('credit.created');

    Route::get('delete-user/{action}', 'UserSessionController')
        ->name('session.delete')
        ->middleware('can:admin');


});



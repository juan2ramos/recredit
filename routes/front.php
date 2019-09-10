<?php


use App\User;

Auth::routes(['register' => false]);
Route::view('/', 'front.home')->name('home');
Route::view('preguntas-frecuentes', 'front.faq')->name('faq');
Route::get('cerrar-sesión', 'Auth\LoginController@logout')->name('logout');

Route::get('pusher', function () {

});


Route::get('/test', function () {
    \MailTemplate::to('juan2ramos@gmail.com');
    \MailTemplate::attribute('NAME', 'Mr User');
    \MailTemplate::attribute('NUMBER', '8092123');
    \MailTemplate::send(240);
});

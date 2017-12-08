<?php
Route::get('/', 'PersonagemController@index');

Route::resource('personagem', 'PersonagemController');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

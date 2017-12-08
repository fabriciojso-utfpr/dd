<?php
Route::get('/home', 'PersonagemController@index');

Route::get('/', 'PersonagemController@index');

Route::resource('personagem', 'PersonagemController');
Auth::routes();


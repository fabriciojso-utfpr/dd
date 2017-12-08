<?php
Route::get('/', 'PersonagemController@index');

Route::resource('personagem', 'PersonagemController');
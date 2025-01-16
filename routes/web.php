<?php

use Illuminate\Support\Facades\Route;

Route::resource('/veiculos', 'App\Http\Controllers\VeiculosController');

Route::get('/motorista/pesquisa', 'App\Http\Controllers\MotoristaController@pesquisa') -> name('motorista.pesquisa');
Route::delete('/motorista/{$id}', 'App\Http\Controllers\MotoristaController@destroy') -> name('motorista.destroy');
Route::resource('/motorista', 'App\Http\Controllers\MotoristaController');

Route::resource('/viagens', 'App\Http\Controllers\ViagensController');

Route::get('/home', 'App\Http\Controllers\HomeController@home') -> name('home');


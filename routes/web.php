<?php

use Illuminate\Support\Facades\Route;

Route::get('/veiculos/pesquisa', 'App\Http\Controllers\VeiculosController@pesquisa') -> name('veiculos.pesquisa');
Route::get('/veiculos/km', 'App\Http\Controllers\VeiculosController@pegarKm') -> name('veiculos.km');
Route::resource('/veiculos', 'App\Http\Controllers\VeiculosController');


Route::get('/motorista/pesquisa', 'App\Http\Controllers\MotoristaController@pesquisa') -> name('motorista.pesquisa');
Route::resource('/motorista', 'App\Http\Controllers\MotoristaController');

Route::get('/viagens/pesquisa', 'App\Http\Controllers\ViagensController@pesquisa') -> name('viagens.pesquisa');
Route::resource('/viagens', 'App\Http\Controllers\ViagensController');

Route::get('/home', 'App\Http\Controllers\HomeController@home') -> name('home');


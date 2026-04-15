<?php

use App\Http\Controllers\CepController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;

Route::get('/', function () {
    return view('welcome');
});

//Rota para o CRUD de clientes
Route::resource('clientes', ClienteController::class);

// Rota para buscar CEP
Route::get('api/cep/{cep}', [CepController::class, 'buscarCep']);


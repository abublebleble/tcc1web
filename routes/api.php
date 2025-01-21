<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Rota protegida por autenticação
Route::get('/user', function (Request $request) {
    return $request->user();  // Retorna os dados do usuário autenticado
})->middleware('auth:sanctum');  // Exige autenticação via Sanctum

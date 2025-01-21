<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProgressoController;

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->get('user', [AuthController::class, 'me']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);


// Rotas para o progresso
Route::middleware('auth:sanctum')->get('progressos', [ProgressoController::class, 'index']);
Route::middleware('auth:sanctum')->post('progressos', [ProgressoController::class, 'store']);
Route::middleware('auth:sanctum')->get('exercicios/treino', [ProgressoController::class, 'getExerciciosTreino']);

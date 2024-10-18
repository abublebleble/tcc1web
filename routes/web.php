<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\GrupoMuscularController;
use App\Http\Controllers\CreateExerciseController;
use App\Http\Controllers\TreinoExercicioController;
use App\Http\Controllers\TreinoController;

Route::get('/', function () {
    return redirect('/home');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/home', [WorkoutController::class, 'index']);

Route::get('/exercises/create/{workoutId}', [ExerciseController::class, 'create'])->name('exercises.create');
Route::post('/exercises/store/{workoutId}', [ExerciseController::class, 'store'])->name('exercises.store');

Route::get('/exercises/{workoutId}/edit/{exerciseId}', [ExerciseController::class, 'edit'])->name('exercises.edit');
Route::put('/exercises/{workoutId}/{exerciseId}', [ExerciseController::class, 'update'])->name('exercises.update');
Route::delete('/exercises/{workoutId}/{exerciseId}', [ExerciseController::class, 'destroy'])->name('exercises.destroy');
Route::get('/home', [WorkoutController::class, 'index']);
Route::resource('workouts', WorkoutController::class);
Route::resource('exercises', ExerciseController::class);

Route::resource('grupos_musculares', GrupoMuscularController::class);
Route::resource('exercicios', CreateExerciseController::class);

Route::resource('treinos_exercicio', TreinoExercicioController::class);

Route::resource('treinos', TreinoController::class);

});

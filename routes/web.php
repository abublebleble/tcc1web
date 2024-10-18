<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\GrupoMuscularController;
use App\Http\Controllers\CreateExerciseController;
use App\Http\Controllers\TreinoExercicioController;
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\ProgressoController;

// Redireciona para o login se o usuário não estiver autenticado
Route::get('/', function () {
    return redirect('/home');
});

// Rotas protegidas por autenticação
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Dashboard padrão do Laravel Jetstream
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Home agora renderiza uma view específica
    Route::get('/home', function () {
        return view('home'); // Aponta para a view 'home.blade.php'
    })->name('home');

    // Rotas para exercícios
    Route::get('/exercises/create/{workoutId}', [ExerciseController::class, 'create'])->name('exercises.create');
    Route::post('/exercises/store/{workoutId}', [ExerciseController::class, 'store'])->name('exercises.store');
    Route::get('/exercises/{workoutId}/edit/{exerciseId}', [ExerciseController::class, 'edit'])->name('exercises.edit');
    Route::put('/exercises/{workoutId}/{exerciseId}', [ExerciseController::class, 'update'])->name('exercises.update');
    Route::delete('/exercises/{workoutId}/{exerciseId}', [ExerciseController::class, 'destroy'])->name('exercises.destroy');

    // CRUD de treinos
    Route::resource('workouts', WorkoutController::class);

    // Rotas para gerenciar exercícios e grupos musculares
    Route::resource('exercicios', CreateExerciseController::class);
    Route::resource('grupos_musculares', GrupoMuscularController::class);

    // Relação entre treinos e exercícios
    Route::resource('treinos_exercicio', TreinoExercicioController::class);

    // CRUD de treinos
    Route::resource('treinos', TreinoController::class);

    // CRUD de progresso
    Route::resource('progresso', ProgressoController::class);
});
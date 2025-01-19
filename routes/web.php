<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkoutController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\GrupoMuscularController;
use App\Http\Controllers\CreateExerciseController;
use App\Http\Controllers\TreinoExercicioController;
use App\Http\Controllers\TreinoController;
use App\Http\Controllers\ProgressoController;

// Redireciona para o login do Jetstream se o usuário não estiver autenticado
Route::get('/', function () {
    return redirect('/login');
});

// Rotas protegidas por autenticação
Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {

    // Dashboard padrão do Laravel Jetstream
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Home agora renderiza uma view específica
    Route::get('/home', function () {
        return view('home');
    })->name('home');

    // Verificação de admin para exercícios
    Route::get('/exercicios', function () {
        if (auth()->user()->is_admin) {
            $exercicios = \App\Models\Exercicio::all();
            return view('exercicios.index', compact('exercicios'));
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('exercicios.index');

    Route::get('/exercicios/create', function () {
        if (auth()->user()->is_admin) {
            $gruposMusculares = \App\Models\GrupoMuscular::all();
            return view('exercicios.create', compact('gruposMusculares'));
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('exercicios.create');

    Route::post('/exercicios/store', function (Request $request) {
        if (auth()->user()->is_admin) {
            $request->validate([
                'nome_exercicio' => 'required|string|max:255',
                'descricao' => 'nullable|string',
                'id_grupo_muscular' => 'required|exists:grupo_muscular,id',
            ]);
            \App\Models\Exercicio::create($request->all());
            return redirect()->route('exercicios.index')->with('success', 'Exercício criado com sucesso!');
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('exercicios.store');

    Route::get('/exercicios/{id}/edit', function ($id) {
        if (auth()->user()->is_admin) {
            $exercicio = \App\Models\Exercicio::findOrFail($id);
            $gruposMusculares = \App\Models\GrupoMuscular::all();
            return view('exercicios.edit', compact('exercicio', 'gruposMusculares'));
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('exercicios.edit');

    Route::put('/exercicios/{id}', function (Request $request, $id) {
        if (auth()->user()->is_admin) {
            $request->validate([
                'nome_exercicio' => 'required|string|max:255',
                'descricao' => 'nullable|string',
                'id_grupo_muscular' => 'required|exists:grupo_muscular,id',
            ]);
            $exercicio = \App\Models\Exercicio::findOrFail($id);
            $exercicio->update($request->all());
            return redirect()->route('exercicios.index')->with('success', 'Exercício atualizado com sucesso!');
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('exercicios.update');

    Route::delete('/exercicios/{id}', function ($id) {
        if (auth()->user()->is_admin) {
            $exercicio = \App\Models\Exercicio::findOrFail($id);
            $exercicio->delete();
            return redirect()->route('exercicios.index')->with('success', 'Exercício excluído com sucesso!');
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('exercicios.destroy');

    // Verificação de admin para grupos musculares
    Route::get('/grupos_musculares', function () {
        if (auth()->user()->is_admin) {
            $gruposMusculares = \App\Models\GrupoMuscular::all();
            return view('grupos_musculares.index', compact('gruposMusculares'));
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('grupos_musculares.index');

    Route::get('/grupos_musculares/create', function () {
        if (auth()->user()->is_admin) {
            return view('grupos_musculares.create');
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('grupos_musculares.create');

    Route::post('/grupos_musculares/store', function (Request $request) {
        if (auth()->user()->is_admin) {
            $request->validate([
                'name' => 'required|unique:grupo_muscular|max:255',
            ]);
            \App\Models\GrupoMuscular::create($request->all());
            return redirect()->route('grupos_musculares.index')->with('success', 'Grupo Muscular criado com sucesso!');
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('grupos_musculares.store');

    Route::get('/grupos_musculares/{id}/edit', function ($id) {
        if (auth()->user()->is_admin) {
            $grupoMuscular = \App\Models\GrupoMuscular::findOrFail($id);
            return view('grupos_musculares.edit', compact('grupoMuscular'));
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('grupos_musculares.edit');

    Route::put('/grupos_musculares/{id}', function (Request $request, $id) {
        if (auth()->user()->is_admin) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $grupoMuscular = \App\Models\GrupoMuscular::findOrFail($id);
            $grupoMuscular->update(['name' => $request->name]);
            return redirect()->route('grupos_musculares.index')->with('success', 'Grupo Muscular atualizado com sucesso!');
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('grupos_musculares.update');

    Route::delete('/grupos_musculares/{id}', function ($id) {
        if (auth()->user()->is_admin) {
            $grupoMuscular = \App\Models\GrupoMuscular::findOrFail($id);
            $grupoMuscular->forceDelete();
            return redirect()->route('grupos_musculares.index')->with('success', 'Grupo Muscular excluído com sucesso!');
        }
        return redirect()->route('dashboard')->with('error', 'Você não tem permissão para acessar esta página.');
    })->name('grupos_musculares.destroy');

    // Outras rotas
    Route::resource('workouts', WorkoutController::class);
    Route::resource('treinos_exercicio', TreinoExercicioController::class);
    Route::resource('treinos', TreinoController::class);
    Route::resource('progresso', ProgressoController::class);
});


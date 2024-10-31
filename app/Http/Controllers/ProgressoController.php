<?php

namespace App\Http\Controllers;

use App\Models\Progresso;
use App\Models\TreinoExercicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressoController extends Controller
{
    public function index()
    {
        // Obtém os progressos do usuário autenticado
        $progressos = Progresso::with('treinoExercicio')
            ->whereHas('treinoExercicio.treino', function($query) {
                $query->where('user_id', Auth::id());
            })->get();

        return view('progresso.index', compact('progressos'));
    }

    public function create()
    {
        // Obtém os exercícios relacionados aos treinos do usuário autenticado
        $treinoExercicios = TreinoExercicio::whereHas('treino', function($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('progresso.create', compact('treinoExercicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_treino_exercicio' => 'required|exists:treino_exercicio,id',
            'data' => 'required|date',
            'carga' => 'required|numeric',
            'repeticoes_realizadas' => 'required|integer',
        ]);

        // Verifica se o treino_exercicio pertence ao treino do usuário autenticado
        $treinoExercicio = TreinoExercicio::findOrFail($request->id_treino_exercicio);
        if ($treinoExercicio->treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para registrar progresso para este exercício.');
        }

        Progresso::create($request->all());

        return redirect()->route('progresso.index')->with('success', 'Progresso registrado com sucesso!');
    }

    public function show(Progresso $progresso)
    {
        // Verifica se o treino_exercicio pertence ao treino do usuário autenticado
        if ($progresso->treinoExercicio->treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para ver este progresso.');
        }

        return view('progresso.show', compact('progresso'));
    }

    public function edit(Progresso $progresso)
    {
        // Verifica se o treino_exercicio pertence ao treino do usuário autenticado
        if ($progresso->treinoExercicio->treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para editar este progresso.');
        }

        $treinoExercicios = TreinoExercicio::whereHas('treino', function($query) {
            $query->where('user_id', Auth::id());
        })->get();

        return view('progresso.edit', compact('progresso', 'treinoExercicios'));
    }

    public function update(Request $request, Progresso $progresso)
    {
        $request->validate([
            'id_treino_exercicio' => 'required|exists:treino_exercicio,id',
            'data' => 'required|date',
            'carga' => 'required|numeric',
            'repeticoes_realizadas' => 'required|integer',
        ]);

        // Verifica se o treino_exercicio pertence ao treino do usuário autenticado
        if ($progresso->treinoExercicio->treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para atualizar este progresso.');
        }

        $progresso->update($request->all());

        return redirect()->route('progresso.index')->with('success', 'Progresso atualizado com sucesso!');
    }

    public function destroy(Progresso $progresso)
    {
        // Verifica se o treino_exercicio pertence ao treino do usuário autenticado
        if ($progresso->treinoExercicio->treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para remover este progresso.');
        }

        $progresso->delete();

        return redirect()->route('progresso.index')->with('success', 'Progresso removido com sucesso!');
    }
}

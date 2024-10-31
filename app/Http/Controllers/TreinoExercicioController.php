<?php

namespace App\Http\Controllers;

use App\Models\TreinoExercicio;
use App\Models\Treino;
use App\Models\Exercicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TreinoExercicioController extends Controller
{
    public function index()
    {
        // Obtém os treinos do usuário autenticado e inclui os exercícios relacionados
        $treinosExercicios = TreinoExercicio::with(['treino', 'exercicio'])
            ->whereHas('treino', function($query) {
                $query->where('user_id', Auth::id());
            })->get();

        return view('treinos_exercicio.index', compact('treinosExercicios'));
    }

    public function create()
    {
        // Obtém os treinos do usuário autenticado
        $treinos = Treino::where('user_id', Auth::id())->get();
        $exercicios = Exercicio::all();
        return view('treinos_exercicio.create', compact('treinos', 'exercicios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_treino' => 'required|exists:treinos,id',
            'id_exercicio' => 'required|exists:exercicios,id',
            'ordem' => 'required|integer',
            'series' => 'required|integer',
            'repeticoes' => 'required|integer',
            'carga' => 'required|numeric',
        ]);

        // Verifica se o treino pertence ao usuário autenticado
        $treino = Treino::findOrFail($request->id_treino);
        if ($treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para adicionar exercícios a este treino.');
        }

        TreinoExercicio::create($request->all());

        return redirect()->route('treinos_exercicio.index')->with('success', 'Exercício adicionado ao treino com sucesso!');
    }

    public function show(TreinoExercicio $treinos_exercicio)
    {
        // Verifica se o treino pertence ao usuário autenticado
        if ($treinos_exercicio->treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para ver este exercício.');
        }

        return view('treinos_exercicio.show', compact('treinos_exercicio'));
    }

    public function edit(TreinoExercicio $treinos_exercicio)
    {
        // Verifica se o treino pertence ao usuário autenticado
        if ($treinos_exercicio->treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para editar este exercício.');
        }

        $treinos = Treino::where('user_id', Auth::id())->get();
        $exercicios = Exercicio::all();
        return view('treinos_exercicio.edit', compact('treinos_exercicio', 'treinos', 'exercicios'));
    }

    public function update(Request $request, TreinoExercicio $treinos_exercicio)
    {
        $request->validate([
            'id_treino' => 'required|exists:treinos,id',
            'id_exercicio' => 'required|exists:exercicios,id',
            'ordem' => 'required|integer',
            'series' => 'required|integer',
            'repeticoes' => 'required|integer',
            'carga' => 'required|numeric',
        ]);

        // Verifica se o treino pertence ao usuário autenticado
        if ($treinos_exercicio->treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para atualizar este exercício.');
        }

        $treinos_exercicio->update($request->all());

        return redirect()->route('treinos_exercicio.index')->with('success', 'Exercício atualizado com sucesso!');
    }

    public function destroy(TreinoExercicio $treinos_exercicio)
    {
        // Verifica se o treino pertence ao usuário autenticado
        if ($treinos_exercicio->treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para remover este exercício.');
        }

        $treinos_exercicio->delete();

        return redirect()->route('treinos_exercicio.index')->with('success', 'Exercício removido do treino com sucesso!');
    }
}

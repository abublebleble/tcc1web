<?php

namespace App\Http\Controllers;

use App\Models\Progresso;
use App\Models\TreinoExercicio;
use Illuminate\Http\Request;

class ProgressoController extends Controller
{
    public function index()
    {
        $progressos = Progresso::with('treinoExercicio')->get(); // Incluindo relacionamento com treino_exercicio
        return view('progresso.index', compact('progressos'));
    }

    public function create()
    {
        $treinoExercicios = TreinoExercicio::all(); // Obtém os exercícios relacionados aos treinos
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

        Progresso::create($request->all());

        return redirect()->route('progresso.index')->with('success', 'Progresso registrado com sucesso!');
    }

    public function show(Progresso $progresso)
    {
        return view('progresso.show', compact('progresso'));
    }

    public function edit(Progresso $progresso)
    {
        $treinoExercicios = TreinoExercicio::all();
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

        $progresso->update($request->all());

        return redirect()->route('progresso.index')->with('success', 'Progresso atualizado com sucesso!');
    }

    public function destroy(Progresso $progresso)
    {
        $progresso->delete();

        return redirect()->route('progresso.index')->with('success', 'Progresso removido com sucesso!');
    }
}

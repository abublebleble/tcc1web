<?php

namespace App\Http\Controllers;

use App\Models\TreinoExercicio;
use App\Models\Treino;
use App\Models\Exercicio;
use Illuminate\Http\Request;

class TreinoExercicioController extends Controller
{
    public function index()
    {
        $treinosExercicios = TreinoExercicio::with(['treino', 'exercicio'])->get();
        return view('treinos_exercicio.index', compact('treinosExercicios'));
    }

    public function create()
    {
        $treinos = Treino::all();
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

        TreinoExercicio::create($request->all());

        return redirect()->route('treinos_exercicio.index')->with('success', 'Exercício adicionado ao treino com sucesso!');
    }

    public function show(TreinoExercicio $treinoExercicio)
    {
        return view('treinos_exercicio.show', compact('treinoExercicio'));
    }

    public function edit(TreinoExercicio $treinoExercicio)
    {
        $treinos = Treino::all();
        $exercicios = Exercicio::all();
        return view('treinos_exercicio.edit', compact('treinoExercicio', 'treinos', 'exercicios'));
    }

    public function update(Request $request, TreinoExercicio $treinoExercicio)
    {
        $request->validate([
            'id_treino' => 'required|exists:treinos,id',
            'id_exercicio' => 'required|exists:exercicios,id',
            'ordem' => 'required|integer',
            'series' => 'required|integer',
            'repeticoes' => 'required|integer',
            'carga' => 'required|numeric',
        ]);

        $treinoExercicio->update($request->all());

        return redirect()->route('treinos_exercicio.index')->with('success', 'Exercício atualizado com sucesso!');
    }

    public function destroy(TreinoExercicio $treinoExercicio)
    {
        $treinoExercicio->delete();

        return redirect()->route('treinos_exercicio.index')->with('success', 'Exercício removido do treino com sucesso!');
    }
}

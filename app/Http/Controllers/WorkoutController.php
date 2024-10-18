<?php

namespace App\Http\Controllers;
use App\Models\Treino;
use App\Models\Usuario;
use Illuminate\Http\Request;

class WorkoutController extends Controller
{
    public function index()
    {
        $treinos = Treino::all();
        return view('workouts.index', compact('treinos'));
    }

    public function create()
    {
        $usuarios = Usuario::all(); // Para obter os usuários disponíveis
        return view('workouts.create', compact('usuarios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_treino' => 'required|max:255',
            'id_usuario' => 'required|exists:usuarios,id',
        ]);

        Treino::create($request->all());

        return redirect()->route('workouts.index')->with('success', 'Treino criado com sucesso!');
    }

    public function show(Treino $treino)
    {
        return view('workouts.show', compact('treino'));
    }

    public function edit($id)
    {
        $treino = Treino::findOrFail($id);
        $usuarios = Usuario::all(); // Para obter os usuários disponíveis
        return view('workouts.edit', compact('treino', 'usuarios'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome_treino' => 'required|string|max:255',
            'id_usuario' => 'required|exists:usuarios,id',
        ]);

        $treino = Treino::findOrFail($id);
        $treino->update($request->all());

        return redirect()->route('workouts.index')->with('success', 'Treino atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $treino = Treino::findOrFail($id);
        $treino->delete();

        return redirect()->route('workouts.index')->with('success', 'Treino excluído com sucesso!');
    }
}
<?php

namespace App\Http\Controllers;

use App\Models\Treino;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TreinoController extends Controller
{
    public function index()
    {
        // Obtém os treinos do usuário autenticado
        $treinos = Treino::where('user_id', Auth::id())->get();
        return view('treinos.index', compact('treinos'));
    }

    public function create()
    {
        return view('treinos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome_treino' => 'required|string|max:255',
        ]);

        // Criação do treino e atribuição do user_id
        Treino::create([
            'nome_treino' => $request->nome_treino,
            'user_id' => Auth::id(), // Atribuindo o user_id do usuário autenticado
        ]);

        return redirect()->route('treinos.index')->with('success', 'Treino criado com sucesso!');
    }

    public function show(Treino $treino)
    {
        // Adiciona verificação para garantir que o treino pertence ao usuário autenticado
        if ($treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para ver este treino.');
        }

        return view('treinos.show', compact('treino'));
    }

    public function edit(Treino $treino)
    {
        // Adiciona verificação para garantir que o treino pertence ao usuário autenticado
        if ($treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para editar este treino.');
        }

        return view('treinos.edit', compact('treino'));
    }

    public function update(Request $request, Treino $treino)
    {
        $request->validate([
            'nome_treino' => 'required|string|max:255',
        ]);

        // Adiciona verificação para garantir que o treino pertence ao usuário autenticado
        if ($treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para atualizar este treino.');
        }

        $treino->update($request->all());

        return redirect()->route('treinos.index')->with('success', 'Treino atualizado com sucesso!');
    }

    public function destroy(Treino $treino)
    {
        // Adiciona verificação para garantir que o treino pertence ao usuário autenticado
        if ($treino->user_id !== Auth::id()) {
            abort(403, 'Você não tem permissão para excluir este treino.');
        }

        $treino->delete();

        return redirect()->route('treinos.index')->with('success', 'Treino excluído com sucesso!');
    }
}

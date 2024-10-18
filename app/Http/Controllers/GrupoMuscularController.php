<?php

namespace App\Http\Controllers;

use App\Models\GrupoMuscular;
use Illuminate\Http\Request;

class GrupoMuscularController extends Controller
{
    public function index()
    {
        $gruposMusculares = GrupoMuscular::all();
        return view('grupos_musculares.index', compact('gruposMusculares'));
    }

    public function create()
    {
        return view('grupos_musculares.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:grupo_muscular|max:255',
        ]);

        GrupoMuscular::create($request->all());

        return redirect()->route('grupos_musculares.index')->with('success', 'Grupo Muscular criado com sucesso!');
    }

    public function show(GrupoMuscular $grupoMuscular)
    {
        return view('grupos_musculares.show', compact('grupoMuscular'));
    }

    public function edit($id)
    {
        // Busca o grupo muscular pelo ID
        $grupoMuscular = GrupoMuscular::findOrFail($id);
    
        // Retorna a view e passa a variável $grupoMuscular
        return view('grupos_musculares.edit', compact('grupoMuscular'));
    }

    public function update(Request $request, $id)
{
    // Validação dos dados recebidos
    $request->validate([
        'name' => 'required|string|max:255',
    ]);

    // Encontrando o grupo muscular pelo ID
    $grupoMuscular = GrupoMuscular::findOrFail($id);

    // Atualizando o grupo muscular
    $grupoMuscular->update([
        'name' => $request->name,
    ]);

    // Redirecionando de volta à listagem com mensagem de sucesso
    return redirect()->route('grupos_musculares.index')->with('success', 'Grupo Muscular atualizado com sucesso!');
}

    public function destroy(GrupoMuscular $grupoMuscular, $id)
    {
            
        $grupoMuscular = GrupoMuscular::findOrFail($id);
        $grupoMuscular->forceDelete();

        return redirect()->route('grupos_musculares.index')->with('success', 'Grupo Muscular excluído com sucesso!');
    }
}
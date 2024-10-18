<?php

namespace App\Http\Controllers;

use App\Models\Exercicio;
use App\Models\GrupoMuscular;
use Illuminate\Http\Request;

class CreateExerciseController extends Controller
{
    public function index()
    {
        $exercicios = Exercicio::all(); // Busca todos os exercícios
        return view('exercicios.index', compact('exercicios')); // Retorna a view com a lista de exercícios
    }

    public function create()
    {
        $gruposMusculares = GrupoMuscular::all(); // Busca todos os grupos musculares para o formulário
        return view('exercicios.create', compact('gruposMusculares')); // Retorna a view para criação
    }

    public function store(Request $request)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome_exercicio' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'id_grupo_muscular' => 'required|exists:grupo_muscular,id', // Verifica se o grupo muscular existe
        ]);

        // Cria um novo exercício
        Exercicio::create($request->all());

        // Redireciona para a lista de exercícios com mensagem de sucesso
        return redirect()->route('exercicios.index')->with('success', 'Exercício criado com sucesso!');
    }

    public function show(Exercicio $exercicio)
    {
        return view('exercicios.show', compact('exercicio')); // Retorna a view para mostrar um exercício
    }

    public function edit($id)
    {
        // Busca o exercício pelo ID
        $exercicio = Exercicio::findOrFail($id);
        $gruposMusculares = GrupoMuscular::all(); // Busca todos os grupos musculares para o formulário

        // Retorna a view e passa as variáveis
        return view('exercicios.edit', compact('exercicio', 'gruposMusculares'));
    }

    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'nome_exercicio' => 'required|string|max:255',
            'descricao' => 'nullable|string',
            'id_grupo_muscular' => 'required|exists:grupo_muscular,id', // Verifica se o grupo muscular existe
        ]);

        // Encontrando o exercício pelo ID
        $exercicio = Exercicio::findOrFail($id);

        // Atualizando o exercício
        $exercicio->update($request->all());

        // Redirecionando de volta à listagem com mensagem de sucesso
        return redirect()->route('exercicios.index')->with('success', 'Exercício atualizado com sucesso!');
    }

    public function destroy($id)
    {
        // Busca o exercício pelo ID
        $exercicio = Exercicio::findOrFail($id);
        $exercicio->delete(); // Exclui o exercício

        // Redireciona de volta à lista com mensagem de sucesso
        return redirect()->route('exercicios.index')->with('success', 'Exercício excluído com sucesso!');
    }
}
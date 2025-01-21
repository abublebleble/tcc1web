<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Progresso;
use App\Models\TreinoExercicio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgressoController extends Controller
{
    // Criar um progresso
    public function store(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'id_treino_exercicio' => 'required|exists:treino_exercicio,id',
            'data' => 'required|date',
            'carga' => 'required|numeric',
            'repeticoes_realizadas' => 'required|integer',
        ]);

        // Verifica se o treino_exercicio pertence ao treino do usuário autenticado
        $treinoExercicio = TreinoExercicio::findOrFail($request->id_treino_exercicio);
        $treino = $treinoExercicio->treino;

        // Verifica se o treino pertence ao usuário autenticado
        if ($treino->user_id !== Auth::id()) {
            return response()->json(['error' => 'Você não tem permissão para registrar progresso para este exercício.'], 403);
        }

        // Cria o progresso, sem enviar o user_id explicitamente
        $progresso = Progresso::create([
            'id_treino_exercicio' => $request->id_treino_exercicio,
            'data' => $request->data,
            'carga' => $request->carga,
            'repeticoes_realizadas' => $request->repeticoes_realizadas,
        ]);

        return response()->json(['message' => 'Progresso registrado com sucesso!', 'progresso' => $progresso], 201);
    }

    // Listar os progressos do usuário autenticado
   // Listar os progressos do usuário autenticado
public function index(Request $request)
{
    // Obtém os progressos do usuário autenticado com o id do exercício
    $query = Progresso::with('treinoExercicio') // Incluindo apenas a relação com TreinoExercicio
        ->whereHas('treinoExercicio.treino', function ($q) {
            $q->where('user_id', Auth::id()); // Garantindo que estamos buscando os treinos do usuário autenticado
        })
        ->orderBy('data', 'desc');
    
    // Filtro pelo nome do exercício
    if ($request->has('exercicio') && $request->input('exercicio')) {
        $query->whereHas('treinoExercicio.exercicio', function($q) use ($request) {
            $q->where('id', $request->input('exercicio'));
        });
    }
    
    // Filtro pela data
    if ($request->has('data') && $request->input('data')) {
        $query->whereDate('data', '=', $request->input('data'));
    }

    // Recupera os progressos filtrados
    $progressos = $query->get();
    
    // Formata a resposta, incluindo o nome do exercício
    $progressos->transform(function($progresso) {
        // Obtém o id do exercício de treinoExercicio
        $idExercicio = $progresso->treinoExercicio->id_exercicio;

        // Busca o nome do exercício correspondente
        $exercicio = \App\Models\Exercicio::find($idExercicio);

        // Adiciona o nome do exercício ao progresso
        $progresso->exercicio_nome = $exercicio ? $exercicio->nome_exercicio : 'Desconhecido';
        return $progresso;
    });
    
    return response()->json(['progressos' => $progressos]);
}
public function getExerciciosTreino(Request $request)
{
    // Obtém os treinos do usuário autenticado e os exercícios associados
    $exercicios = TreinoExercicio::with('exercicio') // Inclui os dados do exercício
        ->whereHas('treino', function ($query) {
            $query->where('user_id', Auth::id()); // Filtra os treinos do usuário autenticado
        })
        ->get()
        ->map(function ($treinoExercicio) {
            return [
                'id' => $treinoExercicio->id,
                'nome_exercicio' => $treinoExercicio->exercicio->nome_exercicio,
            ];
        });

    return response()->json($exercicios);
}

}
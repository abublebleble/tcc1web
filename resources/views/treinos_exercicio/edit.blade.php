<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Exercício do Treino</title>
</head>
<body>
    <h1>Editar Exercício do Treino</h1>

    <form action="{{ route('treinos_exercicio.update', $treinoExercicio->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="id_treino">Treino:</label>
        <select id="id_treino" name="id_treino" required>
            @foreach($treinos as $treino)
                <option value="{{ $treino->id }}" {{ $treino->id == $treinoExercicio->id_treino ? 'selected' : '' }}>
                    {{ $treino->nome_treino }}
                </option>
            @endforeach
        </select>

        <label for="id_exercicio">Exercício:</label>
        <select id="id_exercicio" name="id_exercicio" required>
            @foreach($exercicios as $exercicio)
                <option value="{{ $exercicio->id }}" {{ $exercicio->id == $treinoExercicio->id_exercicio ? 'selected'

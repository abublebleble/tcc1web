<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Exercício ao Treino</title>
</head>
<body>
    <h1>Adicionar Exercício ao Treino</h1>

    <form action="{{ route('treinos_exercicio.store') }}" method="POST">
        @csrf
        
        <label for="id_treino">Treino:</label>
        <select id="id_treino" name="id_treino" required>
            @foreach($treinos as $treino)
                <option value="{{ $treino->id }}">{{ $treino->nome_treino }}</option>
            @endforeach
        </select>

        <label for="id_exercicio">Exercício:</label>
        <select id="id_exercicio" name="id_exercicio" required>
            @foreach($exercicios as $exercicio)
                <option value="{{ $exercicio->id }}">{{ $exercicio->nome_exercicio }}</option>
            @endforeach
        </select>

        <label for="ordem">Ordem:</label>
        <input type="number" id="ordem" name="ordem" required>

        <label for="series">Séries:</label>
        <input type="number" id="series" name="series" required>

        <label for="repeticoes">Repetições:</label>
        <input type="number" id="repeticoes" name="repeticoes" required>

        <label for="carga">Carga:</label>
        <input type="number" step="0.01" id="carga" name="carga" required>

        <button type="submit">Adicionar Exercício</button>
    </form>

    <a href="{{ route('treinos_exercicio.index') }}">Voltar</a>
</body>
</html>

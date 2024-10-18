<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Progresso</title>
</head>
<body>
    <h1>Cadastrar Progresso</h1>

    <form action="{{ route('progresso.store') }}" method="POST">
        @csrf

        <label for="id_treino_exercicio">Exercício:</label>
        <select name="id_treino_exercicio" id="id_treino_exercicio">
            @foreach($treinoExercicios as $te)
                <option value="{{ $te->id }}">{{ $te->exercicio->nome_exercicio }}</option>
            @endforeach
        </select>
        
        <label for="data">Data:</label>
        <input type="date" name="data" id="data" required>

        <label for="carga">Carga:</label>
        <input type="number" step="0.01" name="carga" id="carga" required>

        <label for="repeticoes_realizadas">Repetições Realizadas:</label>
        <input type="number" name="repeticoes_realizadas" id="repeticoes_realizadas" required>

        <button type="submit">Cadastrar</button>
    </form>
</body>
</html>

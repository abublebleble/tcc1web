<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Progresso</title>
</head>
<body>
    <h1>Editar Progresso</h1>

    <form action="{{ route('progresso.update', $progresso->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_treino_exercicio">Exercício:</label>
        <select name="id_treino_exercicio" id="id_treino_exercicio">
            @foreach($treinoExercicios as $te)
                <option value="{{ $te->id }}" {{ $progresso->id_treino_exercicio == $te->id ? 'selected' : '' }}>
                    {{ $te->exercicio->nome_exercicio }}
                </option>
            @endforeach
        </select>
        
        <label for="data">Data:</label>
        <input type="date" name="data" id="data" value="{{ $progresso->data }}" required>

        <label for="carga">Carga:</label>
        <input type="number" step="0.01" name="carga" id="carga" value="{{ $progresso->carga }}" required>

        <label for="repeticoes_realizadas">Repetições Realizadas:</label>
        <input type="number" name="repeticoes_realizadas" id="repeticoes_realizadas" value="{{ $progresso->repeticoes_realizadas }}" required>

        <button type="submit">Atualizar</button>
    </form>
</body>
</html>

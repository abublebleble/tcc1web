<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Treino Exercício</title>
</head>
<body>
    <h1>Editar Treino Exercício</h1>

    <form action="{{ route('treinos_exercicio.update', ['treinos_exercicio' => $treinos_exercicio->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="id_treino">Treino:</label>
        <select name="id_treino" required>
            @foreach ($treinos as $treino)
                <option value="{{ $treino->id }}" {{ $treinos_exercicio->id_treino == $treino->id ? 'selected' : '' }}>
                    {{ $treino->nome_treino }}
                </option>
            @endforeach
        </select>

        <label for="id_exercicio">Exercício:</label>
        <select name="id_exercicio" required>
            @foreach ($exercicios as $exercicio)
                <option value="{{ $exercicio->id }}" {{ $treinos_exercicio->id_exercicio == $exercicio->id ? 'selected' : '' }}>
                    {{ $exercicio->nome_exercicio }}
                </option>
            @endforeach
        </select>

        <label for="ordem">Ordem:</label>
        <input type="number" name="ordem" value="{{ $treinos_exercicio->ordem }}" required>

        <label for="series">Séries:</label>
        <input type="number" name="series" value="{{ $treinos_exercicio->series }}" required>

        <label for="repeticoes">Repetições:</label>
        <input type="number" name="repeticoes" value="{{ $treinos_exercicio->repeticoes }}" required>

        <label for="carga">Carga:</label>
        <input type="number" step="0.01" name="carga" value="{{ $treinos_exercicio->carga }}" required>

        <button type="submit">Atualizar Exercício</button>
    </form>

    <a href="{{ route('treinos_exercicio.index') }}">Voltar</a>
</body>
</html>

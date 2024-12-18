<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Exercício</title>
</head>
<body>
    <h1>Editar Exercício</h1>

    <form action="{{ route('exercicios.update', $exercicio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nome_exercicio">Nome do Exercício:</label>
        <input type="text" id="nome_exercicio" name="nome_exercicio" value="{{ $exercicio->nome_exercicio }}" required>

        <label for="descricao">Descrição:</label>
        <textarea id="descricao" name="descricao">{{ $exercicio->descricao }}</textarea>

        <label for="id_grupo_muscular">Grupo Muscular:</label>
        <select id="id_grupo_muscular" name="id_grupo_muscular" required>
            <option value="">Selecione um grupo muscular</option>
            @foreach ($gruposMusculares as $grupoMuscular)
                <option value="{{ $grupoMuscular->id }}" {{ $grupoMuscular->id == $exercicio->id_grupo_muscular ? 'selected' : '' }}>
                    {{ $grupoMuscular->name }}
                </option>
            @endforeach
        </select>

        <button type="submit">Atualizar Exercício</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
</body>
</html>

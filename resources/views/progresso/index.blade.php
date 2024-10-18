<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Progressos</title>
</head>
<body>
    <h1>Lista de Progressos</h1>
    
    <a href="{{ route('progresso.create') }}">Adicionar Progresso</a>

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Exercício</th>
                <th>Data</th>
                <th>Carga</th>
                <th>Repetições Realizadas</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($progressos as $progresso)
                <tr>
                    <td>{{ $progresso->treinoExercicio->exercicio->nome_exercicio ?? 'Exercício não encontrado' }}</td>
                    <td>{{ $progresso->data }}</td>
                    <td>{{ $progresso->carga }}</td>
                    <td>{{ $progresso->repeticoes_realizadas }}</td>
                    <td>
                        <a href="{{ route('progresso.edit', $progresso->id) }}">Editar</a>
                        <form action="{{ route('progresso.destroy', $progresso->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>

<!-- resources/views/treinos/index.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Treinos</title>
</head>
<body>
    <h1>Lista de Treinos</h1>

    <a href="{{ route('treinos.create') }}">Criar Novo Treino</a>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Treino</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($treinos as $treino)
                <tr>
                    <td>{{ $treino->id }}</td>
                    <td>{{ $treino->nome_treino }}</td>
                    <td>
                        <a href="{{ route('treinos.edit', $treino->id) }}">Editar</a>
                        <form action="{{ route('treinos.destroy', $treino->id) }}" method="POST" style="display:inline;">
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

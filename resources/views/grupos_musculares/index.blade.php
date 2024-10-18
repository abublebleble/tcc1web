<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grupos Musculares</title>
</head>
<body>
    <h1>Grupos Musculares</h1>
    <a href="{{ route('grupos_musculares.create') }}">Adicionar Grupo Muscular</a>

    @if ($message = Session::get('success'))
        <p>{{ $message }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($gruposMusculares as $grupo)
                <tr>
                    <td>{{ $grupo->id }}</td>
                    <td>{{ $grupo->name }}</td>
                    <td>
                        <a href="{{ route('grupos_musculares.edit', $grupo->id) }}">Editar</a>
                        <form action="{{ route('grupos_musculares.destroy', $grupo->id) }}" method="POST" style="display:inline;">
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

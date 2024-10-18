<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Exercícios</title>
</head>
<body>
    <h1>Lista de Exercícios</h1>
    
    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('exercicios.create') }}">Criar Novo Exercício</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome do Exercício</th>
                <th>Descrição</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($exercicios as $exercicio)
                <tr>
                    <td>{{ $exercicio->id }}</td>
                    <td>{{ $exercicio->nome_exercicio }}</td>
                    <td>{{ $exercicio->descricao }}</td>
                    <td>
                        <a href="{{ route('exercicios.edit', $exercicio->id) }}">Editar</a>
                        <form action="{{ route('exercicios.destroy', $exercicio->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
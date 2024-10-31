<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Treinos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Meus Treinos</h1>
        
        <!-- Botão para criar novo treino -->
        <a href="{{ route('treinos.create') }}" class="btn btn-primary mb-3">Criar Treino</a>

        <table class="table">
            <thead>
                <tr>
                    <th>Nome do Treino</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($treinos as $treino)
                    <tr>
                        <td>{{ $treino->nome_treino }}</td>
                        <td>
                            <a href="{{ route('treinos.edit', $treino->id) }}" class="btn btn-warning">Editar</a>
                            <form action="{{ route('treinos.destroy', $treino->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Excluir</button>
                            </form>
                            <a href="{{ route('treinos_exercicio.create', ['treino_id' => $treino->id]) }}" class="btn btn-success">Adicionar Exercício</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('home') }}" class="btn btn-secondary">Voltar para Home</a>
    </div>
</body>
</html>

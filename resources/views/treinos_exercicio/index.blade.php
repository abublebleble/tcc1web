<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Exercícios por Treino</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Lista de Exercícios por Treino</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Botão para criar um novo treino -->
        <a href="{{ route('treinos.create') }}" class="btn btn-primary mb-3">Criar Treino</a>

        <a href="{{ route('treinos_exercicio.create') }}" class="button">Adicionar Exercício a um Treino</a>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Treino</th>
                    <th>Exercício</th>
                    <th>Ordem</th>
                    <th>Séries</th>
                    <th>Repetições</th>
                    <th>Carga</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($treinosExercicios as $treinos_exercicio)
                    <tr>
                        <td>{{ $treinos_exercicio->id }}</td>
                        <td>{{ $treinos_exercicio->treino->nome_treino }}</td>
                        <td>{{ $treinos_exercicio->exercicio->nome_exercicio }}</td>
                        <td>{{ $treinos_exercicio->ordem }}</td>
                        <td>{{ $treinos_exercicio->series }}</td>
                        <td>{{ $treinos_exercicio->repeticoes }}</td>
                        <td>{{ $treinos_exercicio->carga }}</td>
                        <td>
                            <a href="{{ route('treinos_exercicio.edit', ['treinos_exercicio' => $treinos_exercicio->id]) }}">Editar</a>
                            <form action="{{ route('treinos_exercicio.destroy', ['treinos_exercicio' => $treinos_exercicio->id]) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Botão para voltar para a home, agora posicionado no final -->
        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Voltar para Home</a>
    </div>
</body>
</html>

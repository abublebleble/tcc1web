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
                @foreach($treinosExercicios as $treinoExercicio)
                    <tr>
                        <td>{{ $treinoExercicio->id }}</td>
                        <td>{{ $treinoExercicio->treino->nome_treino }}</td>
                        <td>{{ $treinoExercicio->exercicio->nome_exercicio }}</td>
                        <td>{{ $treinoExercicio->ordem }}</td>
                        <td>{{ $treinoExercicio->series }}</td>
                        <td>{{ $treinoExercicio->repeticoes }}</td>
                        <td>{{ $treinoExercicio->carga }}</td>
                        <td>
                            <a href="{{ route('treinos_exercicio.edit', $treinoExercicio->id) }}">Editar</a>
                            <form action="{{ route('treinos_exercicio.destroy', $treinoExercicio->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>

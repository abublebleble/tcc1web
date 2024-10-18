<!-- resources/views/treinos/edit.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Editar Treino</title>
</head>
<body>
    <h1>Editar Treino</h1>

    <form action="{{ route('treinos.update', $treino->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <label for="nome_treino">Nome do Treino:</label>
        <input type="text" name="nome_treino" value="{{ $treino->nome_treino }}" required>

        <button type="submit">Atualizar Treino</button>
    </form>
    <a href="{{ route('treinos.index') }}">Voltar</a>
</body>
</html>

<!-- resources/views/treinos/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Criar Treino</title>
</head>
<body>
    <h1>Criar Novo Treino</h1>

    <form action="{{ route('treinos.store') }}" method="POST">
    @csrf
    <div>
        <label for="nome_treino">Nome do Treino:</label>
        <input type="text" id="nome_treino" name="nome_treino" required>
    </div>
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div>
        <button type="submit">Criar Treino</button>
    </div>
</form>
    <a href="{{ route('treinos.index') }}">Voltar</a>
</body>
</html>

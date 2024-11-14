<!-- resources/views/treinos/create.blade.php -->
<!DOCTYPE html>
<html lang="pt-BR">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="UTF-8">
    <title>Criar Treino</title>
</head>
<body>
    <h1>Criar Novo Treino</h1>

    <form action="{{ route('treinos.store') }}" method="POST">
        @csrf
        <label for="nome_treino">Nome do Treino:</label>
        <input type="text" name="nome_treino" required>

        <button type="submit" >Criar Treino</button>
    </form>
    <a href="{{ route('treinos.index') }}">Voltar</a>
</body>
</html>

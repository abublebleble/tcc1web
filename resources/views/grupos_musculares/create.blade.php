<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Grupo Muscular</title>
</head>
<body>
    <h1>Criar Grupo Muscular</h1>
    <form action="{{ route('grupos_musculares.store') }}" method="POST">
        @csrf
        <label for="name">Nome do Grupo Muscular:</label>
        <input type="text" name="name" required>
        <button type="submit">Salvar</button>
    </form>
</body>
</html>

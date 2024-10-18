<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Treino</title>
</head>
<body>
    <h1>Criar Treino</h1>
    <form action="/workouts/store" method="POST">
        @csrf
        <label for="name">Nome Treino:</label>
        <input type="text" id="name" name="name" required><br>
        <button type="submit">Criar</button>
    </form>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Exercicio</title>
</head>
<body>
    <h1>Criar exercicio para treino </h1>
    <form action="{{ route('exercises.store') }}" method="POST">
        @csrf
        <label for="name">Nome do Exercicio:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="sets">Sets:</label>
        <input type="number" id="sets" name="sets" required><br>

        <label for="reps">Reps:</label>
        <input type="number" id="reps" name="reps" required><br>

        <label for="carga">Carga (em kg):</label>
        <input type="number" id="carga" name="carga" step="0.1" required><br> <!-- Adicionando campo de carga -->

        <button type="submit">Adicionar</button>
    </form>
</body>
</html>

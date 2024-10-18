<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Criar Exercicio</title>
</head>
<body>
    <h1>Criar Exercicio para Treino {{ $workoutId }}</h1>
    <form action="/exercises/store/{{ $workoutId }}" method="POST">
        @csrf
        <label for="name">Nome Exercicio:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="sets">Sets:</label>
        <input type="number" id="sets" name="sets" required><br>

        <label for="reps">Reps:</label>
        <input type="number" id="reps" name="reps" required><br>



        <button type="submit">Adicionar</button>
    </form>
</body>
</html>

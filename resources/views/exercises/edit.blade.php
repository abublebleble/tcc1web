<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Editar Exercicio</title>
</head>
<body>
    <h1>Editar Exercicio para Treino{{ $workoutId }}</h1>
    <form action="{{ route('exercises.update', ['workoutId' => $workoutId, 'exerciseId' => $exerciseId]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome Exercicio:</label>
        <input type="text" id="name" name="name" value="{{ $exercise['name'] }}" required><br>

        <label for="sets">Sets:</label>
        <input type="number" id="sets" name="sets" value="{{ $exercise['sets'] }}" required><br>

        <label for="reps">Reps:</label>
        <input type="number" id="reps" name="reps" value="{{ $exercise['reps'] }}" required><br>

        <button type="submit">Atualizar Exercicio</button>

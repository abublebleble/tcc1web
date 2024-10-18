<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
</head>
<body>
    <h1>Bem Vindo!</h1>
    <a href="{{ route('workouts.create') }}">Criar treino</a>
    <h2>Treinos</h2>
    <ul>
        @foreach($workouts as $index => $workout)
        <li>
            {{ $workout['name'] }}
            <a href="{{ route('exercises.create', $index) }}">Adicionar Exercicio</a>
            <a href="{{ route('workouts.edit', $index) }}">Editar Treino</a>
            <form action="{{ route('workouts.destroy', $index) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit">Deletar Treino</button>
            </form>
            <ul>
                @foreach($workout['exercises'] as $exerciseIndex => $exercise)
                <li>
                {{ $exercise['name'] }}: {{ $exercise['sets'] }} sets de {{ $exercise['reps'] }} reps com {{ $exercise['carga'] }} kg
                    <a href="{{ route('exercises.edit', ['workoutId' => $index, 'exerciseId' => $exerciseIndex]) }}">Editar Exercicio</a>
                    <form action="{{ route('exercises.destroy', ['workoutId' => $index, 'exerciseId' => $exerciseIndex]) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Deletar Exercicio</button>
                    </form>
                </li>
                @endforeach
            </ul>
        </li>
        @endforeach
    </ul>
</body>
</html>

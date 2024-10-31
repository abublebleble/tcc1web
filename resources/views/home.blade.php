<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <h1>Bem-vindo à Home</h1>

        <div>
            <h2>Meus Treinos</h2>
            <a href="{{ route('treinos.create') }}" class="btn btn-primary">Criar Novo Treino</a>
            <a href="{{ route('treinos_exercicio.index') }}" class="btn btn-primary">Ver Meus Treinos</a>
            <!-- Novo botão adicionado para ver progresso -->
            <a href="{{ route('progresso.index') }}" class="btn btn-primary">Ver Progresso</a>
        </div>

     
    </div>
</body>
</html>

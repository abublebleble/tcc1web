<!DOCTYPE html>
<html lang="pt-br">
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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

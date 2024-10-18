<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grupo Muscular</title>
</head>
<body>
    <h1>Editar Grupo Muscular</h1>
    
    <form action="{{ route('grupos_musculares.update', ['grupos_musculare' => $grupoMuscular->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="name">Nome do Grupo Muscular:</label>
        <input type="text" id="name" name="name" value="{{ $grupoMuscular->name }}" required>
        
        <button type="submit">Atualizar Grupo Muscular</button>
    </form>
    
    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>
            {{ session('success') }}
        </div>
    @endif
</body>
</html>
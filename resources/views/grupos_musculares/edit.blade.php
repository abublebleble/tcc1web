<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grupo Muscular</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">
    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-800 mb-6">Editar Grupo Muscular</h1>
                
                <!-- Exibição de mensagens de sucesso -->
                @if (session('success'))
                    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Exibição de erros de validação -->
                @if ($errors->any())
                    <div class="mb-4 px-4 py-3 bg-red-100 text-red-800 rounded-md">
                        <ul class="list-disc pl-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('grupos_musculares.update', ['id' => $grupoMuscular->id]) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')
                    
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nome do Grupo Muscular:</label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="{{ $grupoMuscular->name }}" 
                            required 
                            class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                        >
                    </div>

                    <div class="flex justify-end">
                        <button 
                            type="submit" 
                            class="px-6 py-3 bg-indigo-600 text-white rounded-lg font-semibold hover:bg-indigo-800 transition"
                        >
                            Atualizar Grupo Muscular
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

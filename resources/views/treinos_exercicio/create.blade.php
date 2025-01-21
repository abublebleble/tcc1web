<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar Exercício ao Treino</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-6">
                    {{ __('Adicionar Exercício ao Treino') }}
                </h2>

                <form action="{{ route('treinos_exercicio.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-6">
                        <label for="id_treino" class="block text-sm font-medium text-gray-700 mb-2">
                            Treino:
                        </label>
                        <select id="id_treino" name="id_treino" 
                                class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                                required>
                            @foreach($treinos as $treino)
                                <option value="{{ $treino->id }}">{{ $treino->nome_treino }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="id_exercicio" class="block text-sm font-medium text-gray-700 mb-2">
                            Exercício:
                        </label>
                        <select id="id_exercicio" name="id_exercicio" 
                                class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                                required>
                            @foreach($exercicios as $exercicio)
                                <option value="{{ $exercicio->id }}">{{ $exercicio->nome_exercicio }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="ordem" class="block text-sm font-medium text-gray-700 mb-2">
                            Ordem:
                        </label>
                        <input type="number" id="ordem" name="ordem" 
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                               required step="1" min="0">
                    </div>

                    <div class="mb-6">
                        <label for="series" class="block text-sm font-medium text-gray-700 mb-2">
                            Séries:
                        </label>
                        <input type="number" id="series" name="series" 
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                               required step="1" min="0">
                    </div>

                    <div class="mb-6">
                        <label for="repeticoes" class="block text-sm font-medium text-gray-700 mb-2">
                            Repetições:
                        </label>
                        <input type="number" id="repeticoes" name="repeticoes" 
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                               required step="1" min="0">
                    </div>

                    <div class="mb-6">
                        <label for="carga" class="block text-sm font-medium text-gray-700 mb-2">
                            Carga:
                        </label>
                        <input type="number" id="carga" name="carga" 
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                               required step="0.01" max="999" min="0">
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <button type="submit" 
                                class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300">
                            Adicionar Exercício
                        </button>
                        <a href="{{ route('treinos_exercicio.index') }}" 
                           class="px-6 py-3 rounded-md text-white font-semibold bg-gray-800 hover:bg-gray-700 transition duration-300">
                            Voltar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

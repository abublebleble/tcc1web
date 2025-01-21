<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Progresso</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.0.0/dist/tailwind.min.css">
</head>
<body class="bg-gray-100">

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
                <h2 class="font-semibold text-2xl text-gray-800 leading-tight mb-6">
                    {{ __('Editar Progresso') }}
                </h2>

                <!-- Exibição de mensagem de sucesso após a atualização -->
                @if(session('success'))
                    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('progresso.update', $progresso->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-6">
                        <label for="id_treino_exercicio" class="block text-sm font-medium text-gray-700 mb-2">
                            Exercício:
                        </label>
                        <select name="id_treino_exercicio" id="id_treino_exercicio" 
                                class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                                required>
                            @foreach($treinoExercicios as $te)
                                <option value="{{ $te->id }}" {{ $progresso->id_treino_exercicio == $te->id ? 'selected' : '' }}>
                                    {{ $te->exercicio->nome_exercicio }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-6">
                        <label for="data" class="block text-sm font-medium text-gray-700 mb-2">
                            Data:
                        </label>
                        <input type="date" name="data" id="data" 
                               value="{{ $progresso->data }}"
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="carga" class="block text-sm font-medium text-gray-700 mb-2">
                            Carga:
                        </label>
                        <input type="number" step="0.01" name="carga" id="carga" 
                               value="{{ $progresso->carga }}"
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                               required>
                    </div>

                    <div class="mb-6">
                        <label for="repeticoes_realizadas" class="block text-sm font-medium text-gray-700 mb-2">
                            Repetições Realizadas:
                        </label>
                        <input type="number" name="repeticoes_realizadas" id="repeticoes_realizadas" 
                               value="{{ $progresso->repeticoes_realizadas }}"
                               class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition" 
                               required>
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <button type="submit" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300">
                            Atualizar
                        </button>
                        <a href="{{ route('progresso.index') }}" 
                           class="px-6 py-3 rounded-md text-white font-semibold bg-gray-800 hover:bg-gray-700 transition duration-300">
                            Voltar para a Lista de Progressos
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>
</html>

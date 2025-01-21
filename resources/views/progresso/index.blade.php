<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Progressos') }}
        </h2>
    </x-slot>

    <!-- Incluindo o arquivo cards.css -->
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>

    <!-- Botões principais -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-between">
            <a href="{{ route('progresso.create') }}" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300 ml-auto">
                Adicionar Progresso
            </a>
        </div>
    </div>

    <!-- Filtro de Progressos -->
    <div class="bg-white p-4 rounded-lg shadow-md mb-6">
        <form action="{{ route('progresso.index') }}" method="GET" class="flex gap-4 items-center justify-center max-w-3xl mx-auto">
            <div class="flex flex-col w-1/3">
                <label for="exercicio" class="text-sm font-semibold text-gray-700">Escolher Exercício</label>
                <select name="exercicio" id="exercicio" class="px-4 py-2 border rounded-md mt-1">
                    <option value="">Selecione um exercício</option>
                    @foreach ($exercicios as $exercicio)
                        <option value="{{ $exercicio->id }}" {{ request('exercicio') == $exercicio->id ? 'selected' : '' }}>
                            {{ $exercicio->nome_exercicio }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="flex flex-col w-1/3">
                <label for="data" class="text-sm font-semibold text-gray-700">Data</label>
                <select name="data" id="data" class="px-4 py-2 border rounded-md mt-1">
                    <option value="">Selecione uma data</option>
                    @foreach ($datasComProgressos as $data)
                        <option value="{{ $data->data }}" {{ request('data') == $data->data ? 'selected' : '' }}>
                            {{ \Carbon\Carbon::parse($data->data)->format('d/m/Y') }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300 w-1/3">
                Filtrar
            </button>
        </form>
    </div>

    <!-- Lista de progressos -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if(session('success'))
                    <div class="alert alert-success mb-4 p-4 bg-green-100 text-green-800 rounded-md">{{ session('success') }}</div>
                @endif

                <table class="table-auto w-full text-left border-collapse mb-6">
                    <thead>
                        <tr>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Exercício</th>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Data</th>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Carga</th>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Repetições Realizadas</th>
                            <th class="py-3 px-4 text-sm font-semibold text-gray-700 border-b">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($progressos as $progresso)
                            <tr>
                                <td class="py-3 px-4 border-b">{{ $progresso->treinoExercicio->exercicio->nome_exercicio ?? 'Exercício não encontrado' }}</td>
                                <td class="py-3 px-4 border-b">{{ $progresso->data }}</td>
                                <td class="py-3 px-4 border-b">{{ $progresso->carga }}</td>
                                <td class="py-3 px-4 border-b">{{ $progresso->repeticoes_realizadas }}</td>
                                <td class="py-3 px-4 border-b">
                                    <!-- Botão Editar -->
                                    <a href="{{ route('progresso.edit', $progresso->id) }}" class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2">
                                        Editar
                                    </a>
                                    <!-- Botão Excluir -->
                                    <form action="{{ route('progresso.destroy', $progresso->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('home') }}" class="px-6 py-3 rounded-md text-white font-semibold bg-gray-600 hover:bg-gray-700 transition duration-300 mt-3 inline-block">
                    Voltar para Home
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

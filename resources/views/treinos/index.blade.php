<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-between items-center">
            {{ __('Treinos Criados') }}
            <!-- Botão Criar Treino (alinhado à direita) -->
            <a href="{{ route('treinos.create') }}" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300">
                Criar Treino
            </a>
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- Exibição de mensagem de sucesso -->
                @if(session('success'))
                    <div class="alert alert-success mb-4">{{ session('success') }}</div>
                @endif

                <!-- Tabela de Treinos -->
                <div class="overflow-x-auto">
                    <table class="table table-striped w-full border-separate border-spacing-2">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 text-left font-semibold text-gray-700">Nome do Treino</th>
                                <th class="px-4 py-2 text-left font-semibold text-gray-700">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($treinos as $treino)
                                <tr class="bg-gray-50 hover:bg-gray-100 transition duration-300">
                                    <td class="px-4 py-2 font-medium text-lg text-gray-800">
                                        <span class="bg-indigo-100 text-indigo-600 px-3 py-1 rounded-full">
                                            {{ $treino->nome_treino }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-2 flex space-x-2">
                                        <!-- Botão Editar -->
                                        <a href="{{ route('treinos.edit', $treino->id) }}" class="btn btn-warning px-4 py-2 rounded-md text-white font-semibold bg-yellow-500 hover:bg-yellow-600 transition duration-300">Editar</a>

                                        <!-- Formulário de Exclusão -->
                                        <form action="{{ route('treinos.destroy', $treino->id) }}" method="POST" style="display: inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger px-4 py-2 rounded-md text-white font-semibold bg-red-600 hover:bg-red-700 transition duration-300">Excluir</button>
                                        </form>

                                        <!-- Botão Adicionar Exercício -->
                                        <a href="{{ route('treinos_exercicio.create', ['treino_id' => $treino->id]) }}" class="px-4 py-2 rounded-md text-black font-semibold bg-teal-600 hover:bg-teal-700 transition duration-100">
                                            Adicionar Exercício
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Botão Voltar para Home com padding superior -->
                <a href="{{ route('home') }}" class="btn btn-secondary px-6 py-3 rounded-md text-white font-semibold bg-gray-800 hover:bg-gray-700 transition duration-300 mt-6">
                    Voltar para Home
                </a>
            </div>
        </div>
    </div>
</x-app-layout>

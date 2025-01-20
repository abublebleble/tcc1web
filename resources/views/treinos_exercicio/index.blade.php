<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight inline-block">
            {{ __('Lista de Exercícios por Treino') }}
        </h2>
    </x-slot>

    <!-- Incluindo o arquivo cards.css -->
    <link rel="stylesheet" href="{{ asset('css/cards.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>

    <!-- Botões principais -->
    <div class="bg-white-500 p-4 rounded-lg shadow-md mb-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end">
            <a href="{{ route('treinos.create') }}" class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300">
                Criar Treino
            </a>
            <a href="{{ route('treinos_exercicio.create') }}" class="px-6 py-3 rounded-md text-black font-semibold bg-teal-600 hover:bg-teal-700 transition duration-300 ml-4">
                Adicionar Exercício
            </a>
        </div>
    </div>

    <!-- Dropdown de seleção de treino -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <label for="treino-select" class="block text-sm font-medium text-gray-700">Selecione um treino:</label>
                <select id="treino-select" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                    <option value="" selected>Selecione um treino</option>
                    @foreach($treinosExercicios->groupBy('id_treino') as $id_treino => $exercicios)
                        <option value="{{ $id_treino }}">{{ $exercicios->first()->treino->nome_treino }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <!-- Lista de exercícios por treino -->
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @foreach($treinosExercicios->groupBy('id_treino') as $id_treino => $exercicios)
                <div class="card mb-6 treino-card" data-treino-id="{{ $id_treino }}" style="display: none;">
                    <div class="card__title">{{ $exercicios->first()->treino->nome_treino }}</div>
                    <div class="card__data">
                        <div class="card__right">
                            <div class="item">Exercício</div>
                            <div class="item">Ordem</div>
                            <div class="item">Séries</div>
                            <div class="item">Repetições</div>
                            <div class="item">Carga</div>
                            <div class="item">Ações</div>
                        </div>
                        <div class="card__left">
                            @foreach($exercicios as $treinos_exercicio)
                                <div class="item">{{ $treinos_exercicio->exercicio->nome_exercicio }}</div>
                                <div class="item">{{ $treinos_exercicio->ordem }}</div>
                                <div class="item">{{ $treinos_exercicio->series }}</div>
                                <div class="item">{{ $treinos_exercicio->repeticoes }}</div>
                                <div class="item">{{ $treinos_exercicio->carga }}</div>
                                <div class="item">
                                    <!-- Botão Editar -->
                                    <a href="{{ route('treinos_exercicio.edit', ['treinos_exercicio' => $treinos_exercicio->id]) }}" class="focus:outline-none text-white bg-yellow-500 hover:bg-yellow-600 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2">
                                        Editar
                                    </a>
                                    <!-- Botão Excluir -->
                                    <form action="{{ route('treinos_exercicio.destroy', ['treinos_exercicio' => $treinos_exercicio->id]) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-3 py-2 me-2 mb-2">
                                            Excluir
                                        </button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#treino-select').on('change', function () {
                const selectedTreino = $(this).val();
                $('.treino-card').hide(); // Oculta todos os cards
                if (selectedTreino) {
                    $(`.treino-card[data-treino-id="${selectedTreino}"]`).show(); // Mostra apenas o card do treino selecionado
                }
            });
        });
    </script>
</x-app-layout>

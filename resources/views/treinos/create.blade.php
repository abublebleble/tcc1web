<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Criar Novo Treino') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                <!-- Exibição de mensagem de sucesso após criação do treino -->
                @if(session('success'))
                    <div class="alert alert-success mb-4">{{ session('success') }}</div>
                @endif

                <form action="{{ route('treinos.store') }}" method="POST">
                    @csrf
                    <div class="form-group mb-4">
                        <label for="nome_treino">Nome do Treino:</label>
                        <input type="text" name="nome_treino" class="form-control border-2 border-gray-300 rounded-lg p-2" required>
                    </div>
                    <!-- Botão Criar Treino -->
                    <button type="submit" class="btn btn-primary px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300">
                        Criar Treino
                    </button>
                    <!-- Botão Voltar para Meus Treinos -->
                    <a href="{{ route('treinos.index') }}" class="btn btn-primary px-6 py-3 rounded-md text-white font-semibold bg-gray-800 hover:bg-gray-700 transition duration-300">
                        Voltar para Meus Treinos
                    </a>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

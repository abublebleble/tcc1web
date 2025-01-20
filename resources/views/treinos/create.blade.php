<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800 leading-tight">
            {{ __('Criar Novo Treino') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg overflow-hidden p-6">
                <!-- Exibição de mensagem de sucesso após criação do treino -->
                @if(session('success'))
                    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <form action="{{ route('treinos.store') }}" method="POST">
                    @csrf
                    <div class="mb-6">
                        <label for="nome_treino" class="block text-sm font-medium text-gray-700 mb-2">
                            Nome do Treino:
                        </label>
                        <input 
                            type="text" 
                            name="nome_treino" 
                            class="w-full border border-gray-300 rounded-lg p-3 text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition"
                            placeholder="Digite o nome do treino" 
                            required>
                    </div>

                    <div class="flex items-center justify-between mt-8">
                        <!-- Botão Criar Treino -->
                        <button 
                            type="submit" 
                            class="px-6 py-3 rounded-md text-white font-semibold bg-indigo-600 hover:bg-indigo-800 transition duration-300">
                            Criar Treino
                        </button>
                        <!-- Botão Voltar para Meus Treinos -->
                        <a 
                            href="{{ route('treinos.index') }}" 
                            class="px-6 py-3 rounded-md text-white font-semibold bg-gray-800 hover:bg-gray-700 transition duration-300">
                            Voltar para Meus Treinos
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

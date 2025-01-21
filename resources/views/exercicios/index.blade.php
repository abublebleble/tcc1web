<x-app-layout>
    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-lg rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-semibold text-gray-800">Lista de Exercícios</h1>
                    <a href="{{ route('exercicios.create') }}" class="px-6 py-2 text-white bg-indigo-600 hover:bg-indigo-800 rounded-md transition">
                        Criar Novo Exercício
                    </a>
                </div>

                @if (session('success'))
                    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                        {{ session('success') }}
                    </div>
                @endif

                <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden">
                    <thead class="bg-gray-200">
                        <tr>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">ID</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nome do Exercício</th>
                            <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Descrição</th>
                            <th class="px-6 py-3 text-center text-sm font-medium text-gray-700">Ações</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200">
                        @foreach ($exercicios as $exercicio)
                            <tr>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $exercicio->id }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $exercicio->nome_exercicio }}</td>
                                <td class="px-6 py-4 text-sm text-gray-700">{{ $exercicio->descricao }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-700">
                                    <a href="{{ route('exercicios.edit', $exercicio->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                        Editar
                                    </a>
                                    <form action="{{ route('exercicios.destroy', $exercicio->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded-md hover:bg-red-700 transition" onclick="return confirm('Tem certeza que deseja excluir?');">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>

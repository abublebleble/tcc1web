<x-app-layout>
    <div class="py-6">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-6">
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">Grupos Musculares</h1>
                    <a href="{{ route('grupos_musculares.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-800 transition">
                        Adicionar Grupo Muscular
                    </a>
                </div>

                @if ($message = Session::get('success'))
                    <div class="mb-4 px-4 py-3 bg-green-100 text-green-800 rounded-md">
                        {{ $message }}
                    </div>
                @endif

                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                            <th class="border border-gray-300 px-4 py-2 text-left">Nome</th>
                            <th class="border border-gray-300 px-4 py-2 text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($gruposMusculares as $grupo)
                            <tr class="hover:bg-gray-100">
                                <td class="border border-gray-300 px-4 py-2">{{ $grupo->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $grupo->name }}</td>
                                <td class="border border-gray-300 px-4 py-2 text-center">
                                    <a href="{{ route('grupos_musculares.edit', $grupo->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 transition">
                                        Editar
                                    </a>
                                    <form action="{{ route('grupos_musculares.destroy', $grupo->id) }}" method="POST" class="inline-block">
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

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Progressos') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <a href="{{ route('progresso.create') }}" class="btn btn-primary mb-3">Adicionar Progresso</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Exercício</th>
                            <th>Data</th>
                            <th>Carga</th>
                            <th>Repetições Realizadas</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($progressos as $progresso)
                            <tr>
                                <td>{{ $progresso->treinoExercicio->exercicio->nome_exercicio ?? 'Exercício não encontrado' }}</td>
                                <td>{{ $progresso->data }}</td>
                                <td>{{ $progresso->carga }}</td>
                                <td>{{ $progresso->repeticoes_realizadas }}</td>
                                <td>
                                    <a href="{{ route('progresso.edit', $progresso->id) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('progresso.destroy', $progresso->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Voltar para Home</a>
            </div>
        </div>
    </div>
</x-app-layout>

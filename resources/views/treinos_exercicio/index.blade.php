<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Exercícios por Treino') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-4">
                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <a href="{{ route('treinos.create') }}" class="btn btn-primary mb-3">Criar Treino</a>
                <a href="{{ route('treinos_exercicio.create') }}" class="btn btn-info mb-3">Adicionar Exercício</a>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Treino</th>
                            <th>Exercício</th>
                            <th>Ordem</th>
                            <th>Séries</th>
                            <th>Repetições</th>
                            <th>Carga</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($treinosExercicios as $treinos_exercicio)
                            <tr>
                                <td>{{ $treinos_exercicio->id }}</td>
                                <td>{{ $treinos_exercicio->treino->nome_treino }}</td>
                                <td>{{ $treinos_exercicio->exercicio->nome_exercicio }}</td>
                                <td>{{ $treinos_exercicio->ordem }}</td>
                                <td>{{ $treinos_exercicio->series }}</td>
                                <td>{{ $treinos_exercicio->repeticoes }}</td>
                                <td>{{ $treinos_exercicio->carga }}</td>
                                <td>
                                    <a href="{{ route('treinos_exercicio.edit', ['treinos_exercicio' => $treinos_exercicio->id]) }}" class="btn btn-warning btn-sm">Editar</a>
                                    <form action="{{ route('treinos_exercicio.destroy', ['treinos_exercicio' => $treinos_exercicio->id]) }}" method="POST" style="display:inline;">
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

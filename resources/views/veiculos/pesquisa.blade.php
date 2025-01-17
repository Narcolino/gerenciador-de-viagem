@extends('layout')

@section('content')
<div class="flex flex-col items-center min-h-screen bg-gray-100 py-8">
    <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-semibold text-center text-gray-800 mb-6">Pesquisar Veículo</h2>
        <form action="{{ route('veiculos.pesquisa') }}" method="GET" class="flex items-center gap-4 mb-6">
            <select name="attribute" class="block w-1/4 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option value="modelo">Modelo</option>
                <option value="ano">Ano</option>
                <option value="renavam">Renavam</option>
            </select>
            <input type="text" name="query" placeholder="Digite o valor..." class="block w-3/4 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" />
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">Pesquisar</button>
        </form>

        @if(isset($veiculos) && $veiculos->isNotEmpty())
        <div class="overflow-x-auto">
            <table class="w-full border border-gray-200 rounded-lg">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="px-4 py-2 text-left border-b">ID</th>
                        <th class="px-4 py-2 text-left border-b">Modelo</th>
                        <th class="px-4 py-2 text-left border-b">Ano</th>
                        <th class="px-4 py-2 text-left border-b">Data de Aquisição</th>
                        <th class="px-4 py-2 text-left border-b">KMs Rodados</th>
                        <th class="px-4 py-2 text-left border-b">Renavam</th>
                        <th class="px-4 py-2 text-left border-b">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($veiculos as $veiculo)
                    <tr class="hover:bg-gray-100">
                        <td class="px-4 py-2 border-b">{{ $veiculo->id }}</td>
                        <td class="px-4 py-2 border-b">{{ $veiculo->modelo }}</td>
                        <td class="px-4 py-2 border-b">{{ $veiculo->ano }}</td>
                        <td class="px-4 py-2 border-b">{{ $veiculo->aquisicao }}</td>
                        <td class="px-4 py-2 border-b">{{ $veiculo->km }}</td>
                        <td class="px-4 py-2 border-b">{{ $veiculo->renavam }}</td>
                        <td class="px-4 py-2 border-b">
                            <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-3 py-1 bg-red-600 text-white text-sm rounded-md hover:bg-red-700 transition">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="text-center text-gray-600 mt-6">Nenhum veículo encontrado.</p>
        @endif
    </div>

    @if(session()->has('error'))
    <div class="mt-4 p-4 bg-red-100 text-red-800 rounded-md">
        {{ session()->get('error') }}
    </div>
    @endif

    <button onclick="window.location.href='{{ route('veiculos.index') }}'" 
        class="mt-6 px-6 py-2 bg-gray-300 text-gray-800 rounded-md hover:bg-gray-400 transition">
        Voltar
    </button>
</div>
@endsection

@extends('layout')

@section('content')
<div class="max-w-4xl mx-auto bg-white rounded-lg shadow-lg p-6 mt-6">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Pesquisar Viagens</h2>
    <form method="GET" action="{{ route('viagens.pesquisa') }}" class="space-y-4">
        <!-- Campo de Motorista -->
        <div>
            <label for="motorista_id" class="block text-sm font-medium text-gray-700 mb-1">Motorista</label>
            <select id="motorista_id" name="motorista_id" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option value="">Selecione um motorista</option>
                @foreach($motoristas as $motorista)
                    <option value="{{ $motorista->id }}" {{ request('motorista_id') == $motorista->id ? 'selected' : '' }}>
                        {{ $motorista->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo de Veículo -->
        <div>
            <label for="veiculo_id" class="block text-sm font-medium text-gray-700 mb-1">Veículo</label>
            <select id="veiculo_id" name="veiculo_id" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option value="">Selecione um veículo</option>
                @foreach($veiculos as $veiculo)
                    <option value="{{ $veiculo->id }}" {{ request('veiculo_id') == $veiculo->id ? 'selected' : '' }}>
                        {{ $veiculo->modelo }} - {{ $veiculo->renavam }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <!-- Botão de Pesquisa -->
        <button type="submit" class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
            Pesquisar
        </button>
    </form>
</div>

@if($viagens->isNotEmpty())
    <div class="max-w-4xl mx-auto mt-6 bg-white rounded-lg shadow-lg p-6">
        <h3 class="text-xl font-semibold text-gray-800 mb-4 text-center">Resultados da Pesquisa</h3>
        <table class="min-w-full table-auto bg-white shadow-md rounded-md">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Motoristas</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Veículo</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">KM Inicial</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">KM Final</th>
                    <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($viagens as $viagem)
                    <tr>
                        <td class="px-4 py-2">{{ $viagem->motoristas->pluck('nome')}}</td>
                        <td class="px-4 py-2">{{ $viagem->veiculo->modelo . ' - ' . $viagem->veiculo->renavam }}</td>
                        <td class="px-4 py-2">{{ $viagem->km_inicial }}</td>
                        <td class="px-4 py-2">{{ $viagem->km_final }}</td>
                        <td class="px-4 py-2">
                            <form action="{{ route('viagens.destroy', $viagem->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700 transition">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@else
    <p class="mt-6 text-center text-gray-600">Nenhuma viagem encontrada.</p>
@endif

<!-- Botão Voltar -->
<div class="max-w-4xl mx-auto mt-6">
    <button onclick="window.location.href='{{ route('viagens.index') }}'" class="w-full py-2 bg-gray-300 text-gray-800 font-medium rounded-md hover:bg-gray-400 transition">
        Voltar
    </button>
</div>
@endsection

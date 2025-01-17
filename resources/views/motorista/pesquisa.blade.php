@extends('layout')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-2xl bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Pesquisar Motorista</h2>
        
        <!-- Formulário de Pesquisa -->
        <form action="{{ route('motorista.pesquisa') }}" method="GET" class="mb-6">
            <div class="flex items-center gap-4">
                <select name="attribute" class="w-1/3 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                    <option value="nome">Nome</option>
                    <option value="data_nasc">Data de Nascimento</option>
                    <option value="cnh">CNH</option>
                </select>
                <input type="text" name="query" placeholder="Digite o valor..." class="w-2/3 p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <button type="submit" class="p-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                    Buscar
                </button>
            </div>
        </form>
        
        <!-- Resultados -->
        <div class="border border-gray-300 rounded-md bg-gray-50 p-4">
            @if(isset($motoristas) && $motoristas->isNotEmpty())
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border-b border-gray-300 p-3 text-left text-gray-700">Nome</th>
                            <th class="border-b border-gray-300 p-3 text-left text-gray-700">Data de Nascimento</th>
                            <th class="border-b border-gray-300 p-3 text-left text-gray-700">CNH</th>
                            <th class="border-b border-gray-300 p-3 text-center text-gray-700">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($motoristas as $motorista)
                            <tr class="hover:bg-gray-100">
                                <td class="p-3 text-gray-800">{{ $motorista->nome }}</td>
                                <td class="p-3 text-gray-800">{{ $motorista->data_nascimento }}</td>
                                <td class="p-3 text-gray-800">{{ $motorista->cnh }}</td>
                                <td class="p-3 text-center">
                                    <form action="{{ route('motorista.destroy', $motorista->id) }}" method="post" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="px-4 py-2 bg-red-600 text-white font-semibold rounded-md hover:bg-red-700 transition">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="text-center text-gray-500">Nenhum resultado encontrado.</p>
            @endif
        </div>
    </div>
</div>

@if(session()->has('error'))
    <div class="mt-6 p-4 bg-red-100 text-red-800 rounded-md shadow-md text-center">
        {{ session()->get('error') }}
    </div>
@endif

<div class="text-center mt-6">
    <button onclick="window.location.href='{{ route('motorista.index') }}'" 
        class="px-6 py-2 bg-gray-300 text-gray-800 font-semibold rounded-md hover:bg-gray-400 transition">
        Voltar
    </button>
</div>
@endsection
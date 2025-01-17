@extends('layout')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Cadastrar Motorista</h2>
        <form action="{{ route('motorista.store') }}" method="POST" class="space-y-4">
            @csrf
            <!-- Nome -->
            <div>
                <label for="nome" class="block text-sm font-medium text-gray-700 mb-1">Nome</label>
                <input type="text" id="nome" name="nome" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <!-- Data de Nascimento -->
            <div>
                <label for="data_nasc" class="block text-sm font-medium text-gray-700 mb-1">Data de Nascimento</label>
                <input type="date" id="data_nasc" name="data_nasc" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <!-- CNH -->
            <div>
                <label for="cnh" class="block text-sm font-medium text-gray-700 mb-1">CNH</label>
                <input type="text" id="cnh" name="cnh" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
            </div>
            <!-- Botão Salvar -->
            <button type="submit" class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">Salvar</button>
        </form>
        
        <!-- Botão Voltar -->
        <div class="mt-4">
            <button onclick="window.location.href='{{ route('motorista.index') }}'" 
                class="w-full py-2 bg-gray-300 text-gray-800 font-medium rounded-md hover:bg-gray-400 transition">
                Voltar
            </button>
        </div>
        
        @if(session()->has('error'))
        <div class="mt-4 p-4 bg-red-100 text-red-800 rounded-md">
            {{ session()->get('error') }}
        </div>
        @endif
    </div>
</div>
@endsection

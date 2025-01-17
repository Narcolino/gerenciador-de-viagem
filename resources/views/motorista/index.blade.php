@extends('layout')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white rounded-lg shadow-lg p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Menu Motoristas</h2>
        <!-- Botão Cadastrar -->
        <button onclick="window.location.href='{{ route('motorista.create') }}'" 
            class="w-full py-2 mb-4 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
            Cadastrar
        </button>
        <!-- Botão Pesquisar -->
        <button onclick="window.location.href='{{ route('motorista.pesquisa') }}'" 
            class="w-full py-2 mb-4 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition">
            Pesquisar
        </button>
        <!-- Botão Sair -->
        <button onclick="window.location.href='{{ route('home') }}'" 
            class="w-full bg-red-600 text-white py-2 rounded-md hover:bg-red-700 transition">
            Sair
        </button>
    </div>

    @if(session()->has('success'))
    <div class="mt-6 p-4 bg-green-100 text-green-800 rounded-md shadow-md">
        {{ session()->get('success') }}
    </div>
    @endif
</div>
@endsection

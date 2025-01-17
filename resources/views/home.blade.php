@extends('layout')

@section('content')

<div class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="w-96 text-center p-6 bg-white rounded-lg shadow-lg border border-gray-300">
        <h2 class="text-2xl font-bold mb-8">Tela Principal</h2>
        
        <a href="{{ route('motorista.index') }}" class="mb-4 block">
            <button class="w-full py-3 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">
                Cadastro de Motoristas
            </button>
        </a>
        
        <a href="{{ route('veiculos.index') }}" class="mb-4 block">
            <button class="w-full py-3 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition">
                Cadastro de Carros
            </button>
        </a>
        
        <a href="{{ route('viagens.index') }}" class="block">
            <button class="w-full py-3 bg-yellow-500 text-white font-semibold rounded-md hover:bg-yellow-600 transition">
                Cadastro de Viagens
            </button>
        </a>
    </div>
</div>

@endsection

@extends('layout')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-sm bg-white rounded-lg shadow-md p-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Menu Veículos</h2>
        <div class="space-y-4">
            <button onclick="window.location.href='{{ route('veiculos.create') }}'" 
                class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">
                Cadastrar
            </button>
            <button onclick="window.location.href='{{ route('veiculos.pesquisa') }}'" 
                class="w-full bg-green-600 text-white py-2 rounded-md hover:bg-green-700 transition">
                Pesquisar
            </button>
            <button onclick="window.location.href='{{ route('home') }}'" 
                class="w-full bg-red-600 text-white py-2 rounded-md hover:bg-red-700 transition">
                Sair
            </button>
        </div>
        @if(session()->has('success'))
            <div class="mt-6 p-4 bg-green-100 text-green-800 rounded-md">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
</div>
@endsection

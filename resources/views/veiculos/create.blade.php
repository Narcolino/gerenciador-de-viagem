@extends('layout')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-lg bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Cadastrar Veículo</h2>
        <form action="{{ route('veiculos.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="modelo" class="block text-sm font-medium text-gray-700">Modelo</label>
                <input type="text" id="modelo" name="modelo" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="ano" class="block text-sm font-medium text-gray-700">Ano</label>
                <input type="number" id="ano" name="ano" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="aquisicao" class="block text-sm font-medium text-gray-700">Data de Aquisição</label>
                <input type="date" id="aquisicao" name="aquisicao" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="km" class="block text-sm font-medium text-gray-700">KM Rodados</label>
                <input type="number" id="km" name="km" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required />
            </div>
            <div class="mb-4">
                <label for="renavam" class="block text-sm font-medium text-gray-700">Renavam</label>
                <input type="text" id="renavam" name="renavam" class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm p-2 focus:ring-blue-500 focus:border-blue-500" required />
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-md hover:bg-blue-700 transition">Cadastrar Veículo</button>
        </form>
        <button onclick="window.location.href='{{ route('veiculos.index') }}'" class="w-full mt-4 bg-gray-300 text-gray-800 py-2 rounded-md hover:bg-gray-400 transition">Voltar</button>
    </div>
</div>

@if(session()->has('error'))
    <div class="mt-4 p-4 bg-red-100 text-red-800 rounded-md">
        {{ session()->get('error') }}
    </div>
@endif
@endsection

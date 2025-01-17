@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6 mt-6 text-center">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Menu de Viagens</h2>
    <button onclick="window.location.href='{{ route('viagens.create') }}'" class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition mb-4">Cadastrar</button>
    <button onclick="window.location.href='{{ route('viagens.pesquisa') }}'" class="w-full py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 transition mb-4">Pesquisar</button>
    <button onclick="window.location.href='{{ route('home') }}'" class="w-full bg-red-600 text-white py-2 rounded-md hover:bg-red-700 transition">Sair</button>
</div>

@if(session()->has('success'))
    <div class="mt-4 p-4 bg-green-100 text-green-800 rounded-md">
        {{ session()->get('success') }}
    </div>
@endif
@endsection

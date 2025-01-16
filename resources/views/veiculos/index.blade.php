@extends('layout')

@section('content')
<div style="width: 400px; margin: auto; border: 1px solid #000; padding: 20px; text-align: center;">
    <h2>Cadastro de veiculos</h2>
    <button onclick="window.location.href='{{ route('veiculos.cadastro') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Cadastrar</button>
    <button onclick="window.location.href='{{ route('veiculos.pesquisa') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Pesquisar</button>
    <button onclick="window.location.href='{{ route('home') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Sair</button>
</div>
@endsection
@extends('layout')


@section('content')

<div style="width: 400px; margin: auto; text-align: center; border: 1px solid #000; padding: 30px; background-color: #f9f9f9;">
    <h2 style="margin-bottom: 30px;">Tela Principal</h2>
    <a href="{{ route('motorista.index') }}" style="display: block; margin-bottom: 15px;">
        <button style="padding: 10px 20px; width: 100%; background-color: #007bff; color: white; border: none; cursor: pointer; font-size: 16px;">
            Cadastro de Motoristas
        </button>
    </a>
    <a href="{{ route('veiculos.index') }}" style="display: block; margin-bottom: 15px;">
        <button style="padding: 10px 20px; width: 100%; background-color: #28a745; color: white; border: none; cursor: pointer; font-size: 16px;">
            Cadastro de Carros
        </button>
    </a>
    <a href="{{ route('viagens.index') }}" style="display: block;">
        <button style="padding: 10px 20px; width: 100%; background-color: #ffc107; color: black; border: none; cursor: pointer; font-size: 16px;">
            Cadastro de Viagens
        </button>
    </a>
</div>

@endsection
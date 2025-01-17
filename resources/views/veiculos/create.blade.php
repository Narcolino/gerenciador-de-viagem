@extends('layout')

@section('content')
<div style="width: 600px; margin: auto; border: 1px solid #000; padding: 20px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 20px;">Cadastrar Veículo</h2>
    <form action="{{ route('veiculos.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="modelo" style="display: block; font-weight: bold;">modelo</label>
            <input type="text" id="modelo" name="modelo" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required />
        </div>
        <div style="margin-bottom: 15px;">
            <label for="ano" style="display: block; font-weight: bold;">Ano</label>
            <input type="number" id="ano" name="ano" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required />
        </div>
        <div style="margin-bottom: 15px;">
            <label for="aquisicao" style="display: block; font-weight: bold;">Data de Aquisição</label>
            <input type="date" id="aquisicao" name="aquisicao" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required />
        </div>
        <div style="margin-bottom: 15px;">
            <label for="km" style="display: block; font-weight: bold;">KM Rodados</label>
            <input type="number" id="km" name="km" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required />
        </div>
        <div style="margin-bottom: 15px;">
            <label for="renavam" style="display: block; font-weight: bold;">Renavam</label>
            <input type="text" id="renavam" name="renavam" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required />
        </div>
        <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; cursor: pointer;">Cadastrar Veículo</button>
    </form>
</div>

<button onclick="window.location.href='{{ route('veiculos.index') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Voltar</button>

@endsection

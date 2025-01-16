@extends('layout')

@section('content')
<div style="width: 400px; margin: auto; border: 1px solid #000; padding: 20px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 20px;">Cadastrar Motorista</h2>
    <form action="{{ route('motorista.store') }}" method="POST">
        @csrf
        <div style="margin-bottom: 15px;">
            <label for="nome" style="display: block; margin-bottom: 5px;">Nome</label>
            <input type="text" id="nome" name="nome" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="data_nasc" style="display: block; margin-bottom: 5px;">Data de Nascimento</label>
            <input type="date" id="data_nasc" name="data_nasc" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
        </div>
        <div style="margin-bottom: 15px;">
            <label for="cnh" style="display: block; margin-bottom: 5px;">CNH</label>
            <input type="text" id="cnh" name="cnh" style="width: 100%; padding: 10px; border: 1px solid #ccc;" required>
        </div>
        <button type="submit" style="width: 100%; padding: 10px; background-color: #007bff; color: white; border: none; cursor: pointer;">Salvar</button>
    </form>
</div>  

@if( session()->has('error') )
    <div>
        {{ session()->get('error')}} 
    </div>

@endif

<button onclick="window.location.href='{{ route('motorista.index') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Voltar</button>

@endsection

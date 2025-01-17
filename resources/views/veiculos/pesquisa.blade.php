@extends('layout')

@section('content')
<div style="width: 800px; margin: auto; border: 1px solid #000; padding: 20px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 20px;">Pesquisar Veículo</h2>
    <form action="{{ route('veiculos.pesquisa') }}" method="GET" style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
        <select name="attribute" style="padding: 10px; border: 1px solid #ccc; flex: 1;">
            <option value="modelo">Modelo</option>
            <option value="ano">Ano</option>
            <option value="renavam">Renavam</option>
        </select>
        <input type="text" name="query" placeholder="Digite o valor..." style="padding: 10px; border: 1px solid #ccc; flex: 3;"  />
        <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer;">Pesquisar</button>
    </form>

    @if(isset($veiculos) && $veiculos->isNotEmpty())
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Modelo</th>
                <th>Ano</th>
                <th>Data de Aquisição</th>
                <th>KMs Rodados</th>
                <th>Renavam</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($veiculos as $veiculo)
            <tr>
                <td>{{ $veiculo->id }}</td>
                <td>{{ $veiculo->modelo }}</td>
                <td>{{ $veiculo->ano }}</td>
                <td>{{ $veiculo->aquisicao}}</td>
                <td>{{ $veiculo->km}}</td>
                <td>{{ $veiculo->renavam }}</td>
                <td>
                    <form action="{{ route('veiculos.destroy', $veiculo->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p style="text-align: center; margin-top: 20px;">Nenhum veículo encontrado.</p>
    @endif
</div>

@if( session()->has('error') )
    <div>
        {{ session()->get('error')}} 
    </div>
@endif

<button onclick="window.location.href='{{ route('veiculos.index') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Voltar</button>

@endsection

@extends('layout')

@section('content')
<div style="width: 800px; margin: auto; border: 1px solid #000; padding: 20px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 20px;">Pesquisar Veículo</h2>
    <form action="{{ route('vehicles.search') }}" method="GET" style="display: flex; align-items: center; gap: 10px; margin-bottom: 20px;">
        <select name="filter" style="padding: 10px; border: 1px solid #ccc; flex: 1;">
            <option value="model">Modelo</option>
            <option value="year">Ano</option>
            <option value="renavam">Renavam</option>
        </select>
        <input type="text" name="value" placeholder="Digite o valor..." style="padding: 10px; border: 1px solid #ccc; flex: 3;" required />
        <button type="submit" style="padding: 10px 20px; background-color: #007bff; color: white; border: none; cursor: pointer;">Pesquisar</button>
    </form>

    @if(isset($vehicles) && $vehicles->isNotEmpty())
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
            @foreach($vehicles as $vehicle)
            <tr>
                <td>{{ $vehicle->id }}</td>
                <td>{{ $vehicle->model }}</td>
                <td>{{ $vehicle->year }}</td>
                <td>{{ $vehicle->acquisition_date }}</td>
                <td>{{ $vehicle->kms }}</td>
                <td>{{ $vehicle->renavam }}</td>
                <td>
                    <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST" style="display:inline-block;">
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

<button onclick="window.location.href='{{ route('veiculo.index') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Voltar</button>

@endsection

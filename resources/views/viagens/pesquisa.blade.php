@extends('layout')

@section('content')
<div style="width: 600px; margin: auto; text-align: left; border: 1px solid #000; padding: 30px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 30px;">Pesquisar Viagens</h2>
    <form method="GET" action="{{ route('trips.index') }}">
        <div class="mb-3">
            <label for="driver_id" class="form-label">Motorista</label>
            <select id="driver_id" name="driver_id" class="form-control">
                <option value="">Selecione um motorista</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}" {{ request('driver_id') == $driver->id ? 'selected' : '' }}>
                        {{ $driver->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Veículo</label>
            <select id="vehicle_id" name="vehicle_id" class="form-control">
                <option value="">Selecione um veículo</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}" {{ request('vehicle_id') == $vehicle->id ? 'selected' : '' }}>
                        {{ $vehicle->model }} - {{ $vehicle->renavam }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="km_start" class="form-label">KM Inicial (mínimo)</label>
            <input type="number" id="km_start" name="km_start" class="form-control" value="{{ request('km_start') }}" />
        </div>

        <div class="mb-3">
            <label for="km_end" class="form-label">KM Final (máximo)</label>
            <input type="number" id="km_end" name="km_end" class="form-control" value="{{ request('km_end') }}" />
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Pesquisar</button>
    </form>
</div>

<div class="mt-4">
    <h3>Resultados da Pesquisa</h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Motorista</th>
                <th>Veículo</th>
                <th>KM Inicial</th>
                <th>KM Final</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($trips as $trip)
                <tr>
                    <td>{{ $trip->driver->name }}</td>
                    <td>{{ $trip->vehicle->model }} - {{ $trip->vehicle->renavam }}</td>
                    <td>{{ $trip->km_start }}</td>
                    <td>{{ $trip->km_end }}</td>
                    <td>
                        <form action="{{ route('trips.destroy', $trip->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">Nenhuma viagem encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<button onclick="window.location.href='{{ route('viagens.index') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Voltar</button>

@endsection

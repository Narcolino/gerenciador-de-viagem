@extends('layout')

@section('content')
<div style="width: 400px; margin: auto; text-align: left; border: 1px solid #000; padding: 30px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 30px;">Cadastro de Viagem</h2>
    <form action="{{ route('trips.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="driver_id" class="form-label">Motorista</label>
            <select id="driver_id" name="driver_id" class="form-control" required>
                <option value="">Selecione um motorista</option>
                @foreach($drivers as $driver)
                    <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="vehicle_id" class="form-label">Veículo</label>
            <select id="vehicle_id" name="vehicle_id" class="form-control" required>
                <option value="">Selecione um veículo</option>
                @foreach($vehicles as $vehicle)
                    <option value="{{ $vehicle->id }}">{{ $vehicle->model }} - {{ $vehicle->renavam }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="km_start" class="form-label">KM Inicial</label>
            <input type="number" id="km_start" name="km_start" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="km_end" class="form-label">KM Final</label>
            <input type="number" id="km_end" name="km_end" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Salvar</button>
    </form>
</div>

<button onclick="window.location.href='{{ route('viagens.index') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Voltar</button>

@endsection


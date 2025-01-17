@extends('layout')

@section('content')
<div style="width: 600px; margin: auto; text-align: left; border: 1px solid #000; padding: 30px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 30px;">Pesquisar Viagens</h2>
    <form method="GET" action="{{ route('viagens.pesquisa') }}">
        <!-- Campo de Motorista -->
        <div class="mb-3">
            <label for="motorista_id" class="form-label">Motorista</label>
            <select id="motorista_id" name="motorista_id" class="form-control">
                <option value="">Selecione um motorista</option>
                @foreach($motoristas as $motorista)
                    <option value="{{ $motorista->id }}" {{ request('motorista_id') == $motorista->id ? 'selected' : '' }}>
                        {{ $motorista->nome }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Campo de Veículo -->
        <div class="mb-3">
            <label for="veiculo_id" class="form-label">Veículo</label>
            <select id="veiculo_id" name="veiculo_id" class="form-control">
                <option value="">Selecione um veículo</option>
                @foreach($veiculos as $veiculo)
                    <option value="{{ $veiculo->id }}" {{ request('veiculo_id') == $veiculo->id ? 'selected' : '' }}>
                        {{ $veiculo->modelo }} - {{ $veiculo->renavam }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <!-- Botão de Pesquisa -->
        <button type="submit" class="btn btn-primary" style="width: 100%;">Pesquisar</button>
    </form>
</div>


<<div class="mt-4">
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
            @forelse($viagens as $viagem)
                <tr>
                    <!-- Exibindo o nome do motorista -->
                    <td>{{ $viagem->motorista->nome }}</td>
                    <!-- Exibindo o modelo e renavam do veículo -->
                    <td>{{ $viagem->veiculo->modelo . ' - ' . $viagem->veiculo->renavam }}</td>
                    <td>{{ $viagem->km_inicial }}</td>
                    <td>{{ $viagem->km_final }}</td>
                    <td>
                        <form action="{{ route('viagens.destroy', $viagem->id) }}" method="POST" style="display:inline-block;">
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

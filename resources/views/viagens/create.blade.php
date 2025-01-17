@extends('layout')

@section('content')
<div style="width: 400px; margin: auto; text-align: left; border: 1px solid #000; padding: 30px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 30px;">Cadastro de Viagem</h2>
    <form action="{{ route('viagens.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="motorista_id" class="form-label">Motorista</label>
            <select id="motorista_id" name="motorista_id" class="form-control" required>
                <option value="">Selecione um motorista</option>
                @foreach($motoristas as $motorista)
                    <option value="{{ $motorista->id }}">{{ $motorista->nome }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="veiculo_id" class="form-label">Veículo</label>
            <select id="veiculo_id" name="veiculo_id" class="form-control" required>
                <option value="">Selecione um veículo</option>
                @foreach($veiculos as $veiculo)
                    <option value="{{ $veiculo->id }}">{{ $veiculo->modelo }} - {{ $veiculo->renavam }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="km_inicial" class="form-label">KM Inicial</label>
            <input type="number" id="km_inicial" name="km_inicial" class="form-control" disabled />
            <input type="hidden" id="km_inicial_hidden" name="km_inicial" class="form-control" />
        </div>

        <div class="mb-3">
            <label for="km_final" class="form-label">KM Final</label>
            <input type="number" id="km_final" name="km_final" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-primary" style="width: 100%;">Salvar</button>
    </form>

</div>

<button onclick="window.location.href='{{ route('viagens.index') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Voltar</button>

<script>
    document.getElementById('veiculo_id').addEventListener('change', function() {
        var veiculo_id = this.value;
        var km_inicial = document.getElementById('km_inicial');
        var km_inicial_hidden = document.getElementById('km_inicial_hidden');

        fetch(`/veiculos/km?veiculo_id=${veiculo_id}`)
            .then((response) => response.json())
            .then((data) => {
                console.log(data); 
                km_inicial.value = data.km;
                km_inicial_hidden.value = data.km;
            })
            .catch((error) => {
                console.error('Erro:', error);
            }); 

    });

    document.getElementById('km_final').addEventListener('change', function() {
        var km_final = this.value;
        var km_inicial = document.getElementById('km_inicial').value;

        if (parseInt(km_final) < parseInt(km_inicial)) {
            alert('KM final não pode ser menor que KM inicial');
            this.value = '';
        }
    });

</script>
@endsection 


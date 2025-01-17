@extends('layout')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-lg p-6 mt-6">
    <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Cadastro de Viagem</h2>
    <form action="{{ route('viagens.store') }}" method="POST">
        @csrf
        <!-- Motorista -->
        <div class="mb-4">
            <label for="motorista_id" class="block text-sm font-medium text-gray-700 mb-2">Motorista</label>
            <select id="motorista_id" name="motorista_id" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Selecione um motorista</option>
                @foreach($motoristas as $motorista)
                    <option value="{{ $motorista->id }}">{{ $motorista->nome }}</option>
                @endforeach
            </select>
        </div>

        <!-- Veículo -->
        <div class="mb-4">
            <label for="veiculo_id" class="block text-sm font-medium text-gray-700 mb-2">Veículo</label>
            <select id="veiculo_id" name="veiculo_id" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required>
                <option value="">Selecione um veículo</option>
                @foreach($veiculos as $veiculo)
                    <option value="{{ $veiculo->id }}">{{ $veiculo->modelo }} - {{ $veiculo->renavam }}</option>
                @endforeach
            </select>
        </div>

        <!-- KM Inicial -->
        <div class="mb-4">
            <label for="km_inicial" class="block text-sm font-medium text-gray-700 mb-2">KM Inicial</label>
            <input type="number" id="km_inicial" name="km_inicial" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" disabled />
            <input type="hidden" id="km_inicial_hidden" name="km_inicial" />
        </div>

        <!-- KM Final -->
        <div class="mb-4">
            <label for="km_final" class="block text-sm font-medium text-gray-700 mb-2">KM Final</label>
            <input type="number" id="km_final" name="km_final" class="w-full p-2 border border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500" required />
        </div>

        <!-- Botão Salvar -->
        <button type="submit" class="w-full py-2 bg-blue-600 text-white font-semibold rounded-md hover:bg-blue-700 transition">Salvar</button>
    </form>

    <!-- Botão Voltar -->
    <button onclick="window.location.href='{{ route('viagens.index') }}'" class="mt-4 w-full py-2 bg-gray-300 text-gray-800 font-medium rounded-md hover:bg-gray-400 transition">Voltar</button>
</div>

<script>
    document.getElementById('veiculo_id').addEventListener('change', function() {
        var veiculo_id = this.value;
        var km_inicial = document.getElementById('km_inicial');
        var km_inicial_hidden = document.getElementById('km_inicial_hidden');

        fetch(`/veiculos/km?veiculo_id=${veiculo_id}`)
            .then((response) => response.json())
            .then((data) => {
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

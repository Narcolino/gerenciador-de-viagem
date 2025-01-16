@extends('layout')

@section('content')
<div style="width: 600px; margin: auto; border: 1px solid #000; padding: 20px; background-color: #f9f9f9;">
    <h2 style="text-align: center; margin-bottom: 20px;">Pesquisar Motorista</h2>
    <form action="{{ route('motorista.pesquisa') }}" method="GET" style="margin-bottom: 20px;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <select name="attribute" style="width: 30%; padding: 10px; border: 1px solid #ccc;">
                <option value="nome">Nome</option>
                <option value="data_nasc">Data de Nascimento</option>
                <option value="cnh">CNH</option>
            </select>
            <input type="text" name="query" placeholder="Digite o valor..." style="width: 55%; padding: 10px; border: 1px solid #ccc;">
            <button type="submit" style="width: 15%; padding: 10px; background-color: #007bff; color: white; border: none; cursor: pointer;">Buscar</button>
        </div>
    </form>
    <div style="border: 1px solid #ccc; padding: 15px; background-color: #fff;">
        @if(isset($motoristas) && $motoristas->isNotEmpty())
            <table style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr>
                        <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Nome</th>
                        <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">Data de Nascimento</th>
                        <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: left;">CNH</th>
                        <th style="border-bottom: 1px solid #ccc; padding: 10px; text-align: center;">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($motoristas as $motorista)
                    <tr>
                        <td style="padding: 10px;">{{ $motorista->nome }}</td>
                        <td style="padding: 10px;">{{ $motorista->data_nascimento }}</td>
                        <td style="padding: 10px;">{{ $motorista->cnh }}</td>
                        <td style="padding: 10px; text-align: center;">
                            <form action="{{ route('motorista.destroy', $motorista->id) }}" method="post" style="display: inline;">
                                @csrf
                                {{ method_field('DELETE') }}
                                <button type="submit" style="padding: 5px 10px; background-color: #ff4d4d; color: white; border: none; cursor: pointer;">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p style="text-align: center;">Nenhum resultado encontrado.</p>
        @endif
    </div>
</div>

@if( session()->has('error') )
    <div>
        {{ session()->get('error')}} 
    </div>
@endif

<button onclick="window.location.href='{{ route('motorista.index') }}'" style="display: block; margin: 10px auto; width: 80%; padding: 10px;">Voltar</button>

@endsection

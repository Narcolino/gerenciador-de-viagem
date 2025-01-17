<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Viagens;
use App\Models\Motorista;
use App\Models\Veiculos;

class ViagensController extends Controller
{
    //
    public function index()
    {
        return view('viagens.index');
    }

    public function create()
    {
        $motoristas = Motorista::all();
        $veiculos = Veiculos::all();
        return view('viagens.create', compact('motoristas', 'veiculos'));
    }

    public function store(Request $request)
    {
        //dd($request->input());
        $viagem = new Viagens();
        $viagem->fill($request->input());

        $veiculo = Veiculos::find($request->input('veiculo_id'));
        $veiculo->km = $request->input('km_final');

        $viagem->save();
        $veiculo->save();
        return redirect()->route('viagens.index')->with('success', 'Viagem cadastrada com sucesso');

    }

    public function destroy(Request $request, $id)
    {
        $viagem = Viagens::find($id);
        $viagem->delete();
        return redirect()->back()->with('success', 'Viagem excluída com sucesso');
    }   


    public function pesquisa(Request $request)
    {
        // Carregar motoristas e veículos
        $motoristas = Motorista::all();
        $veiculos = Veiculos::all();
    
        // Consultar as viagens, incluindo as relações com motorista e veiculo
        $viagens = Viagens::with(['motorista', 'veiculo'])
            ->when($request->filled('motorista_id'), function ($query) use ($request) {
                // Filtra viagens pelo motorista selecionado
                $query->where('motorista_id', $request->input('motorista_id'));
            })
            ->when($request->filled('veiculo_id'), function ($query) use ($request) {
                // Filtra viagens pelo veículo selecionado
                $query->where('veiculo_id', $request->input('veiculo_id'));
            })
            ->get();
    
        // Passa os dados para a view
        return view('viagens.pesquisa', compact('viagens', 'motoristas', 'veiculos'));
    }
}

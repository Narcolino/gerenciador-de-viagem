<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculos;

class VeiculosController extends Controller
{
    //
    public function index()
    {
        return view('veiculos.index');
    }

    public function create()
    {
        return view('veiculos.create');
    }

    public function store(Request $request)
    {
        $veiculos = new Veiculos();
        $veiculos->fill($request->input());

        if (Veiculos::where('renavam', $request->input('renavam'))->exists()) {
            return redirect()->back()->with('error', 'Veículo já cadastrado');
        }

        $veiculos->save();

        return redirect()->route('veiculos.index')->with('success', 'Veículo cadastrado com sucesso');

    }

    public function destroy(Request $request, $id)
    {
        $veiculos = Veiculos::find($id);
        $veiculos->delete();
        return redirect()->back()->with('success', 'Veículo excluído com sucesso');
    }

    public function pesquisa(Request $request)
    {
        //dd($request -> input());
        $veiculos = Veiculos::query()
            ->when($request->filled('query') && $request->input('attribute') == 'modelo', function($query) use ($request){
                $query->where('modelo', 'like', "%{$request->input('query')}%");
            })
            ->when($request->filled('query') && $request->input('attribute') == 'ano', function($query) use ($request){
                $query->where('ano', $request->input('query'));
            })
            ->when($request->filled('query') && $request->input('attribute') == 'renavam', function($query) use ($request){
                $query->where('renavam', $request->input('query'));
            })
            ->get();

            
        return view('veiculos.pesquisa', compact('veiculos'));
    }

    public function pegarKm(Request $request)
    {
        $veiculos = Veiculos::find($request->input('veiculo_id'));
        return response ()->json($veiculos);
    }

}

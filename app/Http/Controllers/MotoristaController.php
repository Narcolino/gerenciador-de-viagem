<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Motorista;
use carbon\carbon;

class MotoristaController extends Controller
{
    //
    public function index()
    {
        return view('motorista.index');
    }

    public function create()
    {
        return view('motorista.create');
    }

    public function store(Request $request)
    {
        //dd($request->input());
        $motorista = new Motorista();
        $motorista->fill($request->input());
        $data_nasc = Carbon::parse($request -> input('data_nasc'));
        if($data_nasc->age < 18){
            return redirect()->back()->with('error', 'Motorista menor de idade');
        }
        if (Motorista::where('cnh', $request->input('cnh'))->exists()) {
            return redirect()->back()->with('error', 'Motorista já cadastrado');
        }
        $motorista->data_nascimento = $data_nasc;
        $motorista->save();

        return redirect()->route('motorista.index')->with('success', 'Motorista cadastrado com sucesso');

    }

    public function destroy(Request $request, $id)
    {
        $motorista = Motorista::find($id);
        $motorista->delete();
        return redirect()->back()->with('success', 'Motorista excluído com sucesso');
    }

    public function pesquisa(Request $request)
    {
        $motoristas = Motorista::query()
            ->when($request->filled('query') && $request->input('attribute') == 'nome', function($query) use ($request){
                $query->where('nome', 'like', "%{$request->input('query')}%");
            })
            ->when($request->filled('query') && $request->input('attribute') == 'cnh', function($query) use ($request){
                $query->where('cnh', 'like', "%{$request->input('query')}%");
            })
            ->when($request->filled('query') && $request->input('attribute') == 'data_nasc', function($query) use ($request){
                $query->where('data_nascimento', $request->input('query'));
            })
            ->get();

            
        return view('motorista.pesquisa', compact('motoristas'));
    }
}

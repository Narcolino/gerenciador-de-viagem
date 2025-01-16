<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ViagensController extends Controller
{
    //
    public function index()
    {
        return view('viagens.index');
    }

}

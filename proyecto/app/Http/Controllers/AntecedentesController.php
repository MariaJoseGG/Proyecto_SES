<?php

namespace App\Http\Controllers;

use App\Models\Antecedentes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class AntecedentesController extends Controller
{
    public function index ()
    {
        return view('Auxiliar.antecedentes');
    }

    public function store(Request $request)
    {
        $input = $request->input('input');
        $registro = new Antecedentes;
        $registro->antecedente = $input;
        $registro->save();
        return view('welcome');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Antecedentes;
use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AntecedentesController extends Controller
{
    public function index ()
    {
        return view('Auxiliar.antecedentes')->with('persona', Paciente::all());
    }

    public function create()
    {
        return view('Auxiliar.antecedentes')->with('persona', Paciente::all());
    }

    public function store(Request $request)
    {
        $input = $request->input('input');
        $registro = new Antecedentes;
        $registro->antecedente = $input;
        $registro->paciente = $request->paciente;

        $registro->save();
        return redirect()->route('antecedentes.index')->with('success', 'Antecedente guardado');
    }
}

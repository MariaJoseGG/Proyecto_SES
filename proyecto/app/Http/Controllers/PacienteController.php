<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auxiliar.gestion_pacientes')->with('persona', Paciente::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Auxiliar.crear_paciente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $paciente = new Paciente();
        //variable instanciada de la clase Paciente
        //-> campos de la base de datos = -> name del formulario
        $existe = DB::table('pacientes')->where('documento', $request->iden)->first();
        if (is_null($existe)) {
            $paciente->documento = $request->iden;
            $paciente->tipoDoc = $request->tipoDoc;
            $paciente->nombre = $request->name;
            $paciente->entidad = $request->entidad;
            $paciente->sexo = $request->sexo;
            $paciente->edad = $request->edad;
            $paciente->regimen = $request->reg;
            $paciente->tipoAfiliacion = $request->tipoAf;
            $paciente->cama = $request->cama;
            $paciente->fechaIngreso = $request->fecha;
            $paciente->auxiliarId = Auth::user()->id;
            $paciente->save();

            return redirect()->route('paciente.index')->with('success', 'Paciente guardado');
        } else {
            return redirect()->route('paciente.create')->with('error', 'El número de documento ya existe');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $paciente = Paciente::find($id);
        return view('Auxiliar.editar_paciente')->with('pacientes', $paciente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $paciente->documento = $request->iden;
        $paciente->tipoDoc = $request->tipoDoc;
        $paciente->nombre = $request->name;
        $paciente->entidad = $request->entidad;
        $paciente->sexo = $request->sexo;
        $paciente->edad = $request->edad;
        $paciente->regimen = $request->reg;
        $paciente->tipoAfiliacion = $request->tipoAf;
        $paciente->cama = $request->cama;
        $paciente->fechaIngreso = $request->fecha;
        $paciente->save();

        return redirect()->route('paciente.index')->with('success', 'Datos del paciente actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $paciente = Paciente::find($id);
        // $paciente->delete();
        // return redirect()->route('paciente.index')->with('warning', 'Paciente eliminado con éxito');
    }

    public function generar_pdf()
    {
        $paciente = Paciente::all();
        $pdf = PDF::loadView('Auxiliar.generar_pdf', compact('paciente'));
        return $pdf->stream('pacientes.pdf');
    }
}

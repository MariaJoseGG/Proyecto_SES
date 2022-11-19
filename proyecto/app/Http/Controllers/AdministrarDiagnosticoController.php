<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\AdministrarDiagnostico;
use App\Models\Paciente;
use Illuminate\Support\Facades\Auth;

class AdministrarDiagnosticoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Usuarios.gestion_diagnostico')->with('diagnostico', AdministrarDiagnostico::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Medico.crear_diagnostico')->with('persona', Paciente::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $AdministrarDiagnostico = new AdministrarDiagnostico(); 
        //-> campos de la base de datos = -> name del formulario
        $AdministrarDiagnostico->paciente = $request->paciente;
        $AdministrarDiagnostico->fecha = $request->fecha;
        $AdministrarDiagnostico->tipoPadecimiento = $request->tipoPadecimiento;
        $AdministrarDiagnostico->descripcion = $request->descripcion;
        $AdministrarDiagnostico->medico = Auth::user()->id;
        $AdministrarDiagnostico->save();

        return redirect()->route('AdministrarDiagnostico.index')->with('success', 'Diagnóstico del Paciente guardado');
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
        $AdministrarDiagnostico = AdministrarDiagnostico::find($id);
        return view('Medico.editar_diagnostico')->with('AdministrarDiagnostico', $AdministrarDiagnostico);
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
        
        $AdministrarDiagnostico = AdministrarDiagnostico::find($id);
        
        $AdministrarDiagnostico->fecha = $request->fecha;
        $AdministrarDiagnostico->tipoPadecimiento = $request->tipoPadecimiento;
        $AdministrarDiagnostico->descripcion = $request->descripcion;
        $AdministrarDiagnostico->save();

        return redirect()->route('AdministrarDiagnostico.index')->with('success', 'Diagnóstico del paciente actualizado');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

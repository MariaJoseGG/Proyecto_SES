<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\signosVitales;
use App\Models\Paciente;

class SignosVController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auxiliar.gestion_signos')->with('signos', SignosVitales::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Auxiliar.crear_signos')->with('persona', Paciente::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $signosvitales = new SignosVitales(); 
        //-> campos de la base de datos = -> name del formulario
        $signosvitales->paciente = $request->paciente;
        $signosvitales->fecha = $request->fecha;
        $signosvitales->hora = $request->hora;
        $signosvitales->temperatura = $request->temperatura;
        $signosvitales->pulso = $request->pulso;
        $signosvitales->respiracion = $request->respiracion;
        $signosvitales->presionarterial = $request->presionArterial;
        $signosvitales->presionarterial2 = $request->presionArterial2;
        $signosvitales->pam = $request->PAM;
        $signosvitales->sat = $request->SAT;
        $signosvitales->save();

        return redirect()->route('signosV.index')->with('success', 'Signos Vitales del Paciente guardados');
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
        $signosvitales = signosVitales::find($id);
        return view('Auxiliar.editar_signos')->with('signosVitales', $signosvitales);
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
        $signosvitales = signosVitales::find($id);
        
        $signosvitales->fecha = $request->fecha;
        $signosvitales->hora = $request->hora;
        $signosvitales->temperatura = $request->temperatura;
        $signosvitales->pulso = $request->pulso;
        $signosvitales->respiracion = $request->respiracion;
        $signosvitales->presionarterial = $request->presionArterial;
        $signosvitales->presionarterial2 = $request->presionArterial2;
        $signosvitales->pam = $request->PAM;
        $signosvitales->sat = $request->SAT;
        $signosvitales->save();

        return redirect()->route('signosV.index')->with('success', 'Signos Vitales del paciente actualizados');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $signo = signosVitales::find($id);
        $signo->delete();
        return redirect()->route('signosV.index')->with('warning', 'Signos Vitales del paciente eliminados con éxito');
    }

}

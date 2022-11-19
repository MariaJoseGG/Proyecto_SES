<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Examen;
use App\Models\Paciente;
use App\Models\TipoExamen;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;

class ExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Jefe.gestion_examenes')->with('registro', Paciente::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Jefe.crear_examen')->with('persona', Paciente::all())->with('tipo', TipoExamen::all())->with('doctor', Doctor::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $examen = new Examen(); 
        //-> campos de la base de datos = -> name del formulario
        $examen->tipoExamen = $request->tipo;
        $examen->paciente = $request->paciente;
        $examen->fecha = $request->fecha;
        $examen->hora = $request->hora;
        $examen->doctor = $request->doctor;
        $examen->jefe = Auth::user()->id;

        $examen->save();

        return redirect()->route('examen.index')->with('success', 'Examen registrado para el paciente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('Jefe.ver_examenes')->with('registro', Examen::all())->with('paciente', Paciente::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $examen = Examen::find($id);
        return view('Jefe.editar_examen')->with('persona', Paciente::all())->with('exam', $examen)->with('tipo', TipoExamen::all())->with('doctor', Doctor::all());
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
        $examen = Examen::find($id);

        $examen->tipoExamen = $request->tipo;
        $examen->paciente = $request->paciente;
        $examen->fecha = $request->fecha;
        $examen->hora = $request->hora;
        $examen->doctor = $request->doctor;
        $examen->estado = $request->estado;

        $examen->save();

        return redirect()->route('examen.show',$examen->paciente)->with('warning','Datos del examen actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examen = Examen::find($id);
        $examen->delete();
        return redirect(session('BackUrl'))->with('error','Examen eliminado');
    }
}
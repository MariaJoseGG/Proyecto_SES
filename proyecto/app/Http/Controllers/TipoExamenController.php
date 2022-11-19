<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\TipoExamen;
use Illuminate\Support\Facades\Auth;

class TipoExamenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Administrador.gestion_tipo_examenes')->with('tipo_examen', TipoExamen::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrador.crear_tipo_examen');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tipo_examen = new TipoExamen();
        //-> campos de la base de datos = -> name del formulario
        $tipo_examen->nombre = $request->nombre;
        $tipo_examen->descripcion = $request->descripcion;

        $tipo_examen->save();

        return redirect()->route('tipoexamen.index')->with('success', 'Tipo de examen guardado');
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
        $tipo_examen = TipoExamen::find($id);
        return view('Administrador.editar_tipo_examen')->with('tipo', $tipo_examen);
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
        $tipo_examen = TipoExamen::find($id);
        $tipo_examen->nombre = $request->nombre;
        $tipo_examen->descripcion = $request->descripcion;

        $tipo_examen->save();

        return redirect()->route('tipoexamen.index')->with('success', 'Datos actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipo_examen = TipoExamen::find($id);
        $tipo_examen->delete();
        return redirect()->route('tipoexamen.index')->with('warning', 'Se ha eliminado el tipo de examen');
    }
}
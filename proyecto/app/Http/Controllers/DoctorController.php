<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Administrador.gestion_doctores')->with('doctor', Doctor::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Administrador.crear_doctor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $doctor = new Doctor();

        $existe = DB::table('doctor')->where('documento', $request->documento)->first();
        $existe1 = DB::table('users')->where('identificacion', $request->documento)->first();

        if(is_null($existe)) { //Todavía no hay un doctor registrado con ese número de documento
            if(is_null($existe1)) {
                //Es un médico nuevo, entonces se guardan todos sus datos
                $doctor->documento = $request->documento;
                $doctor->nombre = $request->nombre;
                $doctor->especialidad = $request->especialidad;
                $doctor->save();

                return redirect()->route('doctor.index')->with('success', 'Se ha registrado con éxito');
            }
            else { 
                //El número de documento corresponde a un usuario registrado en el sistema como médico cardiovascular
                $existe2 = DB::table('doctor')->where('es_usuario', $existe1->id)->first();
            
                if(is_null($existe2)) {
                    //El usuario no se ha registrado como doctor
                    if($existe1->tipo_usuario == 3) {
                        $doctor->es_usuario = $existe1->id;
                        $doctor->save();
                        return redirect()->route('doctor.index')->with('success', 'Se ha registrado con éxito');
                    }
                    else {
                        return redirect()->route('doctor.create')->with('error', 'El usuario no es un médico cardiovascular; cambiar su rol e intentar de nuevo');
                    }
                }
                else {
                    return redirect()->route('doctor.create')->with('error', 'El doctor ya está registrado');
                }
            }
        }
        else {
            return redirect()->route('doctor.create')->with('error', 'El número de documento ya existe');
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
        $doctor = Doctor::find($id);
        return view('Administrador.editar_doctor')->with('doctores', $doctor);
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
        $doctor = Doctor::find($id);

        $doctor->documento = $request->documento;
        $doctor->nombre = $request->nombre;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        return redirect()->route('doctor.index')->with('success', 'Datos del doctor actualizados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $doctor->delete();

        return redirect()->route('doctor.index')->with('warning', 'Se ha eliminado al doctor');
    }
}
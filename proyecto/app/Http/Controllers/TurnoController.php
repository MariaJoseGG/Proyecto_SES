<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Turno;
use App\Models\Hour;
use Illuminate\Support\Facades\Auth;

class TurnoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Auxiliar.gestion_turnos')->with('turno', Turno::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        return view('Auxiliar.crear_turno')->with('hora', Hour::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $turno = new Turno();
        $horaEntrada = new Hour();
        $horaSalida = new Hour();
        //variable instanciada de la clase Turno
        //-> campos de la base de datos = -> name del formulario
        $turno->fechaIngreso = $request->fechaIngreso;
        $turno->horaInicio = $request->horaInicio;
        
        $horaEntrada->id = $request->horaInicio;
        $horaE = DB::table('hours')->where('id', $horaEntrada->id)->first();

        $horaSalida->id = $request->horaFin;
        $horaS = DB::table('hours')->where('id', $horaSalida->id)->first();

        $horaIng = explode(":", $horaE->name);

        $horaSali = explode(":", $horaS->name);

        $hora1 = intval($horaIng[0]);
        $hora2 = intval($horaSali[0]);

        if($hora2 < $hora1) { //Si la hora de salida es inferior a la hora de entrada,
                              //se entiende que el turno terminó al día siguiente
            $fechaCalculada = date('Y-m-d', strtotime($request->fechaIngreso. ' + 1 days'));
            $turno->fechaSalida = $fechaCalculada;
        }
        else {
            $turno->fechaSalida = $request->fechaIngreso;
        }

        $turno->horaFin = $request->horaFin;
        $turno->auxiliarId = Auth::user()->id;
        $turno->save();
        return redirect()->route('turno.index')->with('success', 'Turno guardado');
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
        //
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
        //
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
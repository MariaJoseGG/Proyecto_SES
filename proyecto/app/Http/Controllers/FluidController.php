<?php

namespace App\Http\Controllers;

use App\Models\Fluid;
use App\Http\Requests\StoreFluidRequest;
use App\Http\Requests\UpdateFluidRequest;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class FluidController extends Controller
{
    public function index()
    {
        //
        $fluids=Fluid::all();
       // return view('fluids.index',compact('hours'));
        return view('index', compact('fluids'));
    }

    public function store(Request $request)
    {
        $exit = false;
        foreach (Fluid::all() as $fluid) {
            if($fluid->input==null && $exit==false){
                $fluid->update([
                    'input'=>(float)$request->input
                ]);
                $exit = true;
            }
        }
        return FluidController::index();
    }

    public function pdf()
    {
        $fluids = Fluid::all();
        $pdf = PDF::loadView('pdf_vista', compact('fluids'));
        return $pdf->stream('reporte-liquidos.pdf');
    }
}

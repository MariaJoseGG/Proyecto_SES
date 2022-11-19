@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Turnos de {{Auth::user()->name}}
    </p>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="container text-center text-black w-50 p-3">
                <div class="col">
                    <a href="{{route('turno.create')}}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item" style="background-color: rgb(19, 220, 173);"><b>Registrar nuevo turno</b></a>
                </div>
            </div>
        </div>
    </div>
</div>

@foreach($turno as $registro)
@if($registro->auxiliarId === Auth::user()->id)
<div class="container w-50" style="background-color: rgb(220,220,220);">
    <h5>Fecha: {{$registro->fechaIngreso}}
        @if($registro->fechaIngreso !== $registro->fechaSalida)
        --- {{$registro->fechaSalida}}
        @endif
    </h5>
    <p>Hora de ingreso: {{DB::table('hours')->where('id', $registro->horaInicio)->value('name');}}</p>
    <p>Hora de salida: {{DB::table('hours')->where('id', $registro->horaFin)->value('name');}}</p>
</div>
@endif
@endforeach
@endsection
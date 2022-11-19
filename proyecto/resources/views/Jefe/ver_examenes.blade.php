@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Exámenes Pendientes de {{$paciente->nombre}}
    </p>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

@foreach($registro as $examen)
@if($examen->paciente == $paciente->id)
<div class="container p-3 w-50">
    <div class="row">
        <h5 class="p-2" style="background-color: rgb(220,220,220);">
            {{DB::table('tipo_examen')->where('id', $examen->tipoExamen)->value('nombre');}}
        </h5>
        <div class="col">
            <h6>Fecha: {{$examen->fecha}}</h6>
            <h6>Hora: {{$examen->hora}}</h6>
            <h6>Doctor: {{DB::table('doctor')->where('id', $examen->doctor)->value('nombre');}}</h6>
            <p>Asignado por el jefe de enfermería: {{DB::table('users')->where('id', $examen->jefe)->value('name');}}</p>
        </div>
        <div class="col text-end">
            @if($examen->estado==0)
            <i class="bi bi-calendar-minus"></i>
            Pendiente
            @else
            <i class="bi bi-calendar-check"></i>
            Realizado
            @endif
            <div class="p-2"></div>
            {{Session::flash('BackUrl', url()->current());}}
            <a href="{{route('examen.edit',$examen->id)}}" class="btn btn-primary">
                <i class="bi bi-pencil-fill"></i>
            </a>
            <form action="{{route('examen.destroy', $examen ?? ''->id)}}" method="POST">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger">
                    <i class="bi bi-trash-fill"></i>
                </button>
            </form>
        </div>
    </div>

</div>
@endif
@endforeach

@endsection
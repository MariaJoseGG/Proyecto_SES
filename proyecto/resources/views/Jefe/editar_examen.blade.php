@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            ADMINISTRACIÓN DEL SISTEMA
        </b>
        <br>
        Exámenes del Paciente
    </p>
</div>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="container p-3">
    <form action="{{route('examen.update',$exam->id)}}" method="POST">
        @method('PUT');
        @csrf
        <div class="row mb-3">
            <label for="tipo" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de examen') }}</label>
            <div class="col-md-6">
                <select id="tipo" class="form-control" name="tipo" required>
                @foreach($tipo as $tipoExamen)
                @if($tipoExamen->id === $exam->tipoExamen)
                <option value="{{$tipoExamen->id}}" selected>{{$tipoExamen->nombre}}</option>
                @else
                <option value="{{$tipoExamen->id}}">{{$tipoExamen->nombre}}</option>
                @endif
                @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="paciente" class="col-md-4 col-form-label text-md-end">{{ __('Paciente') }}</label>
            <div class="col-md-6">
                <select id="paciente" class="form-control" name="paciente" required>
                @foreach($persona as $paciente)
                @if($paciente->id === $exam->paciente)
                <option value="{{$paciente->id}}" selected>{{$paciente->nombre}}</option>
                @else
                <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                @endif
                @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha del examen') }}</label>
            <div class="col-md-6">
                <input value="{{$exam->fecha}}" id="fecha" type="date" class="form-control" name="fecha" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="hora" class="col-md-4 col-form-label text-md-end">{{ __('Hora del examen') }}</label>
            <div class="col-md-6">
                <input value="{{$exam->hora}}" id="hora" type="time" class="form-control" name="hora" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="doctor" class="col-md-4 col-form-label text-md-end">{{ __('Doctor encargado') }}</label>
            <div class="col-md-6">
                <select id="doctor" class="form-control" name="doctor" required>
                @foreach($doctor as $encargado)
                @if($encargado->id === $exam->doctor)
                <option value="{{$encargado->id}}" selected>{{$encargado->nombre}}</option>
                @else
                <option value="{{$encargado->id}}">{{$encargado->nombre}}</option>
                @endif
                @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="estado" class="col-md-4 col-form-label text-md-end">{{ __('Estado del examen') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="estado" id="estado">
                    @if($exam->estado == 0)
                    <option value="0" selected>Pendiente</option>
                    <option value="1">Realizado</option>
                    @else
                    <option value="0">Pendiente</option>
                    <option value="1" selected>Realizado</option>
                    @endif
                </select>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="boton">
                    {{ __('Editar') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
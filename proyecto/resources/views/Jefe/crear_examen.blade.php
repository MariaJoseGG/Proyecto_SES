@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Exámenes
    </p>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="container p-3">
    <form action="{{ route('examen.store') }}" method="POST"> 
        @csrf
        <div class="row mb-3">
            <label for="tipo" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de examen') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="tipo" id="tipo">
                    @foreach($tipo as $tipoExamen)
                    <option value="{{$tipoExamen->id}}">{{$tipoExamen->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="paciente" class="col-md-4 col-form-label text-md-end">{{ __('Paciente') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="paciente" id="paciente">
                    @foreach($persona as $paciente)
                    <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha del examen') }}</label>
            <div class="col-md-6">
                <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="hora" class="col-md-4 col-form-label text-md-end">{{ __('Hora del examen') }}</label>
            <div class="col-md-6">
                <input id="hora" type="time" class="form-control" name="hora" value="{{ old('hora') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="doctor" class="col-md-4 col-form-label text-md-end">{{ __('Doctor responsable') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="doctor" id="doctor">
                    @foreach($doctor as $doc)
                    <option value="{{$doc->id}}">{{$doc->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="bot">
                    {{ __('Guardar') }}
                </button>
            </div>
        </div>

    </form>
</div>
@endsection
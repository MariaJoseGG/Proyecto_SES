@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Signos Vitales
    </p>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="container p-3">
    <form action="{{ route('signosV.store') }}" method="POST"> 
        @csrf
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
            <label for="fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de registro') }}</label>
            <div class="col-md-6">
                <input id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="hora" class="col-md-4 col-form-label text-md-end">{{ __('Hora de registro') }}</label>
            <div class="col-md-6">
                <input id="hora" type="time" class="form-control" name="hora" value="{{ old('hora') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="temperatura" class="col-md-4 col-form-label text-md-end">{{ __('Temperatura') }}</label>
            <div class="col-md-6">
                <input id="temperatura" type="number" step="0.01" class="form-control" name="temperatura" value="{{ old('temperatura') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="pulso" class="col-md-4 col-form-label text-md-end">{{ __('Pulso') }}</label>
            <div class="col-md-6">
                <input id="pulso" type="number" class="form-control" name="pulso" value="{{ old('pulso') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="respiracion" class="col-md-4 col-form-label text-md-end">{{ __('Respiración') }}</label>
            <div class="col-md-6">
                <input id="respiracion" type="number" class="form-control" name="respiracion" value="{{ old('respiracion') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="presionArterial" class="col-md-4 col-form-label text-md-end">{{ __('Presion Arterial - Numerador') }}</label>
            <div class="col-md-6">
                <input id="presionArterial" type="number" class="form-control" name="presionArterial" value="{{ old('presionArterial') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="presionArterial2" class="col-md-4 col-form-label text-md-end">{{ __('Presion Arterial - Denominador') }}</label>
            <div class="col-md-6">
                <input id="presionArterial2" type="number" class="form-control" name="presionArterial2" value="{{ old('presionArterial2') }}" onfocusout="verificar()" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="PAM" class="col-md-4 col-form-label text-md-end">{{ __('PAM') }}</label>
            <div class="col-md-6">
                <input id="PAM" type="number" step="0.01" class="form-control" name="PAM" value="{{ old('PAM') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="SAT" class="col-md-4 col-form-label text-md-end">{{ __('SAT') }}</label>
            <div class="col-md-6">
                <input id="SAT" type="number" class="form-control" name="SAT" value="{{ old('SAT') }}" required>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="bot" disabled>
                    {{ __('Guardar') }}
                </button>
            </div>
        </div>


    </form>
</div>
@endsection
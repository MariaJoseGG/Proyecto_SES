@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Turnos
    </p>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="container p-3">
    <form action="{{ route('turno.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="fechaIngreso" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de ingreso') }}</label>
            <div class="col-md-6">
                <input id="fechaIngreso" type="date" class="form-control" name="fechaIngreso" value="{{ old('fechaIngreso') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="horaInicio" class="col-md-4 col-form-label text-md-end">{{ __('Hora de inicio') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="horaInicio" id="horaInicio">
                    @foreach($hora as $hour)
                    <option value="{{$hour->id}}">{{$hour->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="horaFin" class="col-md-4 col-form-label text-md-end">{{ __('Hora de finalización') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="horaFin" id="horaFin">
                    @foreach($hora as $hour)
                    <option value="{{$hour->id}}">{{$hour->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="boton">
                    {{ __('Guardar') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
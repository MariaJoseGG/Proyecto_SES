@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Doctores
    </p>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="container p-3">
    <form action="{{ route('doctor.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <label for="documento" class="col-md-4 col-form-label text-md-end">{{ __('Número de documento') }}</label>
            <div class="col-md-6">
                <input id="documento" type="text" class="form-control" name="documento" value="{{ old('documento') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
            <div class="col-md-6">
                <input id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="especialidad" class="col-md-4 col-form-label text-md-end">{{ __('Especialidad') }}</label>
            <div class="col-md-6">
                <input id="especialidad" type="text" class="form-control" name="especialidad" value="{{ old('especialidad') }}" required>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="boton">
                    {{ __('Registrar') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
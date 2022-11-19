@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            ADMINISTRACIÓN DEL SISTEMA
        </b>
        <br>
        Doctores
    </p>
</div>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

@if(is_null($doctores->es_usuario))
<div class="container p-3">
    <form action="{{route('doctor.update',$doctores->id)}}" method="POST">
        @method('PUT');
        @csrf
        <div class="row mb-3">
            <label for="documento" class="col-md-4 col-form-label text-md-end">{{ __('Número de documento') }}</label>
            <div class="col-md-6">
                <input value="{{$doctores->documento}}" id="documento" type="text" class="form-control" name="documento" value="{{ old('documento') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
            <div class="col-md-6">
                <input value="{{$doctores->nombre}}" id="nombre" type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="especialidad" class="col-md-4 col-form-label text-md-end">{{ __('Especialidad') }}</label>
            <div class="col-md-6">
                <input value="{{$doctores->especialidad}}" id="especialidad" type="text" class="form-control" name="especialidad" value="{{ old('especialidad') }}">
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
@else
<div class="container">
    <div class="card text-center">
        <div class="card-header">
        </div>
        <div class="card-body">
            <p class="card-text">El doctor seleccionado es un usuario del sistema. ¿Desea editar sus datos?</p>
            <a href="{{ route('doctor.index') }}" class="btn btn-danger">Cancelar</a>
            <a href="{{ route('usuario.edit',$doctores->es_usuario) }}" class="btn btn-primary">Editar datos del usuario</a>
        </div>
        <div class="card-footer text-muted">
        </div>
    </div>
</div>
@endif
@endsection
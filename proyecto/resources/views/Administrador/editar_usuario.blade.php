@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            ADMINISTRACIÓN DEL SISTEMA
        </b>
        <br>
        Usuarios
    </p>
</div>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>
<div class="container p-3">
    <form action="{{route('usuario.update',$usuarios->id)}}" method="POST">
        @method('PUT');
        @csrf
        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre completo') }}</label>
            <div class="col-md-6">
                <input value="{{$usuarios->name}}" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}">
            </div>
        </div>

        <div class="row mb-3">
            <label for="identificacion" class="col-md-4 col-form-label text-md-end">{{ __('Identificación') }}</label>
            <div class="col-md-6">
                <input value="{{$usuarios->identificacion}}" id="identificacion" type="text" class="form-control @error('name') is-invalid @enderror" name="identificacion" value="{{ old('identificacion') }}" required autocomplete="name">
            </div>
        </div>

        <div class="row mb-3">
            <label for="fechaNac" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de Nacimiento') }}</label>
            <div class="col-md-6">
                <input value="{{$usuarios->fechaNac}}" id="fechaNac" type="date" class="form-control @error('name') is-invalid @enderror" name="fechaNac" value="{{ old('fechaNac') }}" required autocomplete="name">
            </div>
        </div>

        <div class="row mb-3">
            <label for="sexo" class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>
            <div class="col-md-6">
                <select id="sexo" type="text" class="form-control @error('name') is-invalid @enderror form-select" name="sexo" value="{{ old('sexo') }}" required autocomplete="name">
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="{{$usuarios->sexo}}" selected>{{$usuarios->sexo}}</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Correo electrónico') }}</label>
            <div class="col-md-6">
                <input value="{{$usuarios->email}}" id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" disabled>
                <!-- El email no debería poder editarse, ni siquiera por un administrador -->
            </div>
        </div>

        <div class="row mb-3">
            <label for="rol" class="col-md-4 col-form-label text-md-end">{{ __('Rol') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="rol" id="rol">
                    <option value="0">Auxiliar de enfermería</option>
                    <option value="1">Administrador</option>
                </select>
            </div>
        </div>

        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="boton">
                    {{ __('Cambiar') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
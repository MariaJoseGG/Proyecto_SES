@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Pacientes
    </p>
</div>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>
<div class="container p-3">
    <form action="{{route('paciente.update',$pacientes->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label for="tipoDoc" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de documento') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="tipoDoc" id="tipoDoc">
                    <option value="Cédula de ciudadanía">Cédula de ciudadanía</option>
                    <option value="Tarjeta de identidad">Tarjeta de identidad</option>
                    <option value="Registro civil">Registro civil</option>
                    <option value="Pasaporte">Pasaporte</option>
                    <option value="{{$pacientes->tipoDoc}}" selected>{{$pacientes->tipoDoc}}</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="iden" class="col-md-4 col-form-label text-md-end">{{ __('Número de documento') }}</label>
            <div class="col-md-6">
                <input value="{{$pacientes->documento}}" id="iden" type="text" class="form-control" name="iden" value="{{ old('iden') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nombre completo') }}</label>
            <div class="col-md-6">
                <input value="{{$pacientes->nombre}}" id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="entidad" class="col-md-4 col-form-label text-md-end">{{ __('Entidad') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="entidad" id="entidad">
                    <option value="Salud Total">Salud Total</option>
                    <option value="Nueva EPS">Nueva EPS</option>
                    <option value="Sanitas">Sanitas</option>
                    <option value="Otra">Otra</option>
                    <option value="{{$pacientes->entidad}}" selected>{{$pacientes->entidad}}</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="sexo" class="col-md-4 col-form-label text-md-end">{{ __('Sexo') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="sexo" id="sexo">
                    <option value="Femenino">Femenino</option>
                    <option value="Masculino">Masculino</option>
                    <option value="{{$pacientes->sexo}}" selected>{{$pacientes->sexo}}</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="edad" class="col-md-4 col-form-label text-md-end">{{ __('Edad') }}</label>
            <div class="col-md-6">
                <input value="{{$pacientes->edad}}" id="edad" type="number" class="form-control" name="edad" value="{{ old('edad') }}" placeholder="edad en años" onfocusout="validar()" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="reg" class="col-md-4 col-form-label text-md-end">{{ __('Régimen de Seguridad Social') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="reg" id="reg">
                    <option value="Contributivo">Contributivo</option>
                    <option value="Subsidiado">Subsidiado</option>
                    <option value="Indígena">Indígena</option>
                    <option value="Vinculado">Vinculado</option>
                    <option value="Particular">Particular</option>
                    <option value="{{$pacientes->regimen}}" selected>{{$pacientes->regimen}}</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="tipoAf" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de afiliación') }}</label>
            <div class="col-md-6">
                <select class="form-select" aria-label="Default select example" name="tipoAf" id="tipoAf">
                    <option value="Cotizante">Cotizante</option>
                    <option value="Beneficiario">Beneficiario</option>
                    <option value="Adicional">Adicional</option>
                    <option value="Otro">Otro</option>
                    <option value="{{$pacientes->tipoAfiliacion}}" selected>{{$pacientes->tipoAfiliacion}}</option>
                </select>
            </div>
        </div>

        <div class="row mb-3">
            <label for="cama" class="col-md-4 col-form-label text-md-end">{{ __('Cama') }}</label>
            <div class="col-md-6">
                <input value="{{$pacientes->cama}}" id="cama" type="text" class="form-control" name="cama" value="{{ old('cama') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de ingreso') }}</label>
            <div class="col-md-6">
                <input value="{{$pacientes->fechaIngreso}}" id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required>
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
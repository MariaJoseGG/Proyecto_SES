@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Diagnóstico
    </p>
</div>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="container p-3">
    <form action="{{route('AdministrarDiagnostico.update',$AdministrarDiagnostico->id)}}" method="POST">
        @method('PUT')
        @csrf
        <div class="row mb-3">
            <label for="paciente" class="col-md-4 col-form-label text-md-end">{{ __('Paciente') }}</label>
            <div class="col-md-6">
                <input value="{{DB::table('pacientes')->where('id', $AdministrarDiagnostico->paciente)->value('nombre');}}" id="iden" type="text" class="form-control" name="paciente" value="{{ old('paciente') }}" disabled>
            </div>
        </div>

        <div class="row mb-3">
            <label for="fecha" class="col-md-4 col-form-label text-md-end">{{ __('Fecha de registro') }}</label>
            <div class="col-md-6">
                <input value="{{$AdministrarDiagnostico->fecha}}" id="fecha" type="date" class="form-control" name="fecha" value="{{ old('fecha') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="tipoPadecimiento" class="col-md-4 col-form-label text-md-end">{{ __('Tipo de Padecimiento') }}</label>
            <div class="col-md-6">
                <input value="{{$AdministrarDiagnostico->tipoPadecimiento}}" id="tipoPadecimiento" type="text" class="form-control" name="tipoPadecimiento" value="{{ old('tipoPadecimiento') }}" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripcion') }}</label>
            <div class="col-md-6">
                <input value="{{$AdministrarDiagnostico->descripcion}}" id="descripcion" class="form-control" name="descripcion" required></input>
            </div>
        </div>
        
        <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
                <button type="submit" class="btn btn-primary" id="bot">
                    {{ __('Editar') }}
                </button>
            </div>
        </div>
    </form>
</div>
@endsection
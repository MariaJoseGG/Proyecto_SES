@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            ADMINISTRACIÓN DEL SISTEMA
        </b>
        <br>
        Tipos de Exámenes
    </p>
</div>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>
<div class="container p-3">
    <form action="{{route('tipoexamen.update',$tipo->id)}}" method="POST">
        @method('PUT');
        @csrf
        <div class="row mb-3">
            <label for="nombre" class="col-md-4 col-form-label text-md-end">{{ __('Nombre') }}</label>
            <div class="col-md-6">
            <input value="{{$tipo->nombre}}" id="nombre" type="text" class="form-control" name="nombre" required>
            </div>
        </div>

        <div class="row mb-3">
            <label for="descripcion" class="col-md-4 col-form-label text-md-end">{{ __('Descripción') }}</label>
            <div class="col-md-6">
            <input value="{{$tipo->descripcion}}" id="descripcion" type="text" class="form-control" name="descripcion" required>
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
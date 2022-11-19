@extends('layouts.app')

@section('content')
<div class="container">
    <div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
        <p class="mx-4 my-4 fs-5">
            <b>
                CONTROL HEMODINÁMICO
            </b>
            <br>
            Inicio
        </p>
    </div>
</div>

<div class="container">
    <div class="row p-3">
        <div class="col">
            <a href="{{route('examen.index')}}" class="list-group-item list-group-item-action">
                <div class="text-center p-3">
                    <img class="img-fluid" src="{{ asset('img/examenes.jpg') }}" alt="Enfermera hablando con una niña" width="300">
                    <figcaption class="p-2">Administrar Exámenes de Pacientes</figcaption>
                </div>
            </a>
        </div>
    </div>
</div>
@endsection
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
            <a href="{{route('paciente.index')}}" class="list-group-item list-group-item-action">
                <div class="text-center p-3">
                    <img class="img-fluid" src="{{ asset('img/pacientes.png') }}" alt="Enfermera hablando con una niña" width="300">
                    <figcaption class="p-2">Administrar Pacientes</figcaption>
                </div>
            </a>
        </div>

    <!-- <div class="row p-3"> -->
        <div class="col">
            <a href="{{route('signosV.index')}}" class="list-group-item list-group-item-action"> <!--cambiar ruta-->
                <div class="text-center p-3">
                    <img class="img-fluid" src="{{ asset('img/signos-vitales-0.jpg') }}" alt="signos vitales" width="300">
                    <figcaption class="p-2">Administrar Signos Vitales</figcaption>
                </div>
            </a>
        </div>
    </div>
    <!-- </div> -->
    <div class="col">
            <a href="{{route('AdministrarDiagnostico.index')}}" class="list-group-item list-group-item-action"> <!--cambiar ruta-->
                <div class="text-center p-3">
                    <img class="img-fluid" src="{{ asset('img/diagnostico.jpg') }}" alt="Administrar Diagnostico" width="300">
                    <figcaption class="p-2">Administrar Diagnostico</figcaption>
                </div>
            </a>
        </div>
    </div>


</div>
@endsection
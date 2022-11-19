@extends('layouts.app')

@section('content')
@if( Auth::guest() )
<div class="container text-center">
    <h3>No es posible acceder a esta información</h3>
    <b>Por favor inicie sesión</b>
</div>
@else
@if(Auth::user()->tipo_usuario == 0 || Auth::user()->tipo_usuario == 2 || Auth::user()->tipo_usuario == 3)
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Diagnóstico de pacientes
    </p>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

@if(Auth::user()->tipo_usuario == 3)
<div class="container">
    <div class="row">
        <div class="col">
            <div class="container text-center text-black w-50 p-3">
                <div class="col">
                    <a href="{{route('AdministrarDiagnostico.create')}}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item" style="background-color: rgb(19, 220, 173);"><b>Nuevo registro de diagnóstico</b></a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

<div class="table-responsive p-4">
    <table class="table table-bordered border-primary text-center table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Paciente</th>
                <th scope="col">Fecha del registro</th>
                <th scope="col">Tipo de Padecimiento</th>
                <th scope="col">Descripción</th>
                @if(Auth::user()->tipo_usuario == 3)
                <th scope="col">Acciones</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($diagnostico as $Adiagnostico)
            <!-- Solo se van a mostrar los pacientes que se encuentren activos en el sistema -->
            @if(DB::table('pacientes')->where('id', $Adiagnostico->paciente)->value('estado')==="Activo")
            <tr>
                <td>{{DB::table('pacientes')->where('id', $Adiagnostico->paciente)->value('nombre')}}</td>
                <td>{{$Adiagnostico->fecha}}</td>
                <td>{{$Adiagnostico->tipoPadecimiento}}</td>
                <td>{{$Adiagnostico->descripcion}}</td>

                @if(Auth::user()->tipo_usuario == 3)
                <td>
                    <a href="{{ route('AdministrarDiagnostico.edit',$Adiagnostico->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                </td>
                @endif
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endif
@endif
@endsection
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

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

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

<div class="table-responsive p-4">
    <table class="table table-bordered border-primary text-center table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Paciente</th>
                <th scope="col">Fecha del registro</th>
                <th scope="col">Tipo de Padecimiento</th>
                <th scope="col">Descripción</th>
                <th scope="col">Acciones</th>
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

                <td>
                    <a href="{{ route('AdministrarDiagnostico.edit',$Adiagnostico->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{route('AdministrarDiagnostico.destroy',$Adiagnostico ?? ''->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
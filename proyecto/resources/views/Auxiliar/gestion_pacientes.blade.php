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

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="container text-center text-black w-50 p-3">
                <div class="col">
                    <a href="{{route('paciente.create')}}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item" style="background-color: rgb(19, 220, 173);"><b>Registrar nuevo paciente</b></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container text-center text-black w-50 p-3">
                <div class="col">
                    <a href="{{route('restaurar.index')}}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item" style="background-color: rgb(19, 220, 173);"><b>Ver pacientes eliminados</b></a>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="container text-center text-black w-50 p-3">
                <div class="col">
                    <a href="{{route('descargar-pdf')}}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item" style="background-color: rgb(19, 220, 173);"><b>Generar lista de pacientes (PDF)</b></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive p-4">
    <table class="table table-bordered border-primary text-center table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Tipo de documento</th>
                <th scope="col">Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Sexo</th>
                <th scope="col">Edad</th>
                <th scope="col">Entidad</th>
                <th scope="col">Régimen de Seguridad Social</th>
                <th scope="col">Tipo de afiliación</th>
                <th scope="col">Cama</th>
                <th scope="col">Fecha de ingreso</th>
                <th scope="col">Registrado por</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($persona as $paciente)
            <!-- Solo se van a mostrar los pacientes que se encuentren activos en el sistema -->
            @if($paciente->estado==="Activo")
            <tr>
                <td>{{$paciente->tipoDoc}}</td>
                <td>{{$paciente->documento}}</td>
                <td>{{$paciente->nombre}}</td>
                <td>{{$paciente->sexo}}</td>
                <td>{{$paciente->edad}}</td>
                <td>{{$paciente->entidad}}</td>
                <td>{{$paciente->regimen}}</td>
                <td>{{$paciente->tipoAfiliacion}}</td>
                <td>{{$paciente->cama}}</td>
                <td>{{$paciente->fechaIngreso}}</td>

                <td>{{DB::table('users')->where('id', $paciente->auxiliarId)->value('name');}}</td>

                <td>
                    <a href="{{ route('paciente.edit',$paciente->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{ route('restaurar.update',$paciente->id) }}" method="POST">
                        @method('PUT')
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
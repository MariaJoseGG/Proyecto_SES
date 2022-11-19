@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Pacientes registrados
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
                    <a href="{{route('examen.create')}}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item" style="background-color: rgb(19, 220, 173);"><b>Registrar un nuevo examen</b></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive p-4">
    <table class="table table-bordered border-primary text-center table-hover">
        <thead class="table-primary">
            <tr>
                <th scope="col">Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Sexo</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($registro as $persona)
            @if($persona->estado==="Activo")
            <tr>
                <td>{{$persona->documento}}</td>
                <td>{{$persona->nombre}}</td>
                <td>{{$persona->sexo}}</td>

                <td>
                    <a href="{{ route('examen.show',$persona->id) }}" class="btn btn-primary">
                        <i class="bi bi-eye"> Ver exámenes</i>
                    </a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            CONTROL HEMODINÁMICO
        </b>
        <br>
        Signos Vitales
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
                    <a href="{{route('signosV.create')}}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item" style="background-color: rgb(19, 220, 173);"><b>Nuevo registro de signos vitales</b></a>
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
                <th scope="col">Hora del registro</th>
                <th scope="col">Temperatura</th>
                <th scope="col">Pulso</th>
                <th scope="col">Respiración</th>
                <th scope="col">Presión Arterial</th>
                <th scope="col">PAM</th>
                <th scope="col">SAT</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($signos as $signoVital)
            <!-- Solo se van a mostrar los pacientes que se encuentren activos en el sistema -->
            @if(DB::table('pacientes')->where('id', $signoVital->paciente)->value('estado')==="Activo")
            <tr>
                <td>{{DB::table('pacientes')->where('id', $signoVital->paciente)->value('nombre')}}</td>
                <td>{{$signoVital->fecha}}</td>
                <td>{{$signoVital->hora}}</td>
                <td>{{$signoVital->temperatura}}°C</td>
                <td>{{$signoVital->pulso}} lat/min</td>
                <td>{{$signoVital->respiracion}} respiros/min</td>
                <td>{{$signoVital->presionarterial}}/{{$signoVital->presionarterial2}} mmHg</td>
                <td>{{$signoVital->pam}} mmHg</td>
                <td>{{$signoVital->sat}}%</td>

                <td>
                    <a href="{{ route('signosV.edit',$signoVital->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{route('signosV.destroy',$signoVital ?? ''->id)}}" method="POST">
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
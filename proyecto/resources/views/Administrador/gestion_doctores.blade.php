@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            ADMINISTRACIÓN DEL SISTEMA
        </b>
        <br>
        Administrar Doctores
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
                    <a href="{{route('doctor.create')}}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item" style="background-color: rgb(19, 220, 173);"><b>Registrar un nuevo doctor</b></a>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="table-responsive p-4">
    <table class="table table-bordered border-primary text-center">
        <thead class="table-primary">
            <tr>
                <th scope="col">Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Especialidad</th>
                <th scope="col">Usuario del sistema</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doctor as $doc)
            <tr>
                @if(empty($doc->es_usuario))
                <td>{{$doc->documento}}</td>
                <td>{{$doc->nombre}}</td>
                <td>{{$doc->especialidad}}</td>
                <td>No</td>
                @else
                <td>{{DB::table('users')->where('id', $doc->es_usuario)->value('identificacion');}}</td>
                <td>{{DB::table('users')->where('id', $doc->es_usuario)->value('name');}}</td>
                <td>Cardiovascular</td>
                <td>Sí</td>
                @endif

                <td>
                    <a href="{{ route('doctor.edit',$doc->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{route('doctor.destroy',$doc ?? ''->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-danger">
                            <i class="bi bi-trash-fill"></i>
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
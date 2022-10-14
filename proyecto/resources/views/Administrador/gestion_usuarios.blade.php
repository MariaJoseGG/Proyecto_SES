@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            ADMINISTRACIÓN DEL SISTEMA
        </b>
        <br>
        Administrar Usuarios
    </p>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="table-responsive p-4">
    <table class="table table-bordered border-primary text-center">
        <thead class="table-primary">
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Identificación</th>
                <th scope="col">Fecha de nacimiento</th>
                <th scope="col">Sexo</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Tipo de usuario</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($persona as $usuario)
            <tr>
                <td>{{$usuario->name}}</td>
                <td>{{$usuario->identificacion}}</td>
                <td>{{$usuario->fechaNac}}</td>
                <td>{{$usuario->sexo}}</td>
                <td>{{$usuario->email}}</td>
                
                @if ($usuario->tipo_usuario === "0")
                <td>Auxiliar de enfermería</td>
                @else
                <td>Administrador</td>
                @endif

                <td>
                    <a href="{{ route('usuario.edit',$usuario->id) }}" class="btn btn-primary">
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <form action="{{route('usuario.destroy',$usuario ?? ''->id)}}" method="POST">
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
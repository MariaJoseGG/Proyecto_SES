@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            ADMINISTRACIÓN DEL SISTEMA
        </b>
        <br>
        Página Principal
    </p>
</div>

<div class="container text-center">
    <div class="row">
        <div class="col">
            <a href="{{route('usuario.index')}}" class="list-group-item list-group-item-action">
                <div class="text-center p-3">
                    <img class="img-fluid" src="{{ asset('img/usuarios.jpg') }}" alt="Imagen de una mira enfocando como objetivo un grupo de 3 usuarios" width="300">
                    <figcaption class="p-2">Administrar Usuarios</figcaption>
                    <!-- Como todos los usuarios cuando se registran, por defecto son auxiliares de enfermería, solo los administradores pueden asignar a uno de los usuarios existentes como Administrador 
                        o editar sus datos-->
                </div>
            </a>
        </div>
    </div>
</div>

</html>
@endsection
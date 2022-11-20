@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            ANTECEDENTES
        </b>
        <br>
    </p>
</div>

<div class="container w-75 pt-2">
    @include('flash-message')
</div>

<div class="container text-center mt-5">
    <div class="row align-items-start">
        <div class="col">
            <div class="mb-3">
                <form method="POST" action="{{ route('antecedentes.store') }}">
                    @csrf
                    <div class="col-md-6">
                        <select class="form-select" aria-label="Default select example" name="paciente" id="paciente">
                            @foreach($persona as $paciente)
                            <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <label for="Ingrese Antecedentes" class="form-label">Ingrese Antecedentes del paciente seleccionado</label>
                    <textarea name="input" class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
            </div>
            <center> <button type="submit" class="btn btn-primary">Guardar</button></center>
            </form>
        </div>
        <div class="col">
            <div align="right"><IMG SRC="{{ asset('img/diagnostico-remove.png') }}" width="500" height="300"></div>
        </div>
    </div>
    <br><br><br>
    <br><br>
    @endsection
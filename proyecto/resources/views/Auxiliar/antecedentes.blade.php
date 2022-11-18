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
<div class="container text-center mt-5">
        <div class="row align-items-start">
        <!-- <form method="POST" action="{{ route('fluids.store') }}">
        @csrf
        <div class="mb-3">
            <label for="hora" class="form-label">Cantidad de líquido</label>
            <input name="input" type="text" class="form-control" id="hora">
        </div>
        <button type="submit" class="btn btn-primary">Ingresar</button>
    </form> -->
    <div class="col">
        <div class="mb-3">
            <form  method="POST" action="{{ route('antecedentes.store') }}">
                @csrf
                <label for="Ingrese Antecedentes" class="form-label"> Ingrese Antecedentes</label>
                <textarea name="input" class="form-control" id="exampleFormControlTextarea1" rows="8"></textarea>
            </div>
          <center>  <button type="submit" class="btn btn-primary">Guardar</button></center>
          </form>
          </div>
          <div class="col">
            <div align="right"><IMG SRC="{{ asset('img/diagnostico-remove.png') }}"  width="500"
                height="300"></div>
          </div>
        </div>
        <br><br><br>
          <br><br>
@endsection
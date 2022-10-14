@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Calcular Balance') }}</div>

                <div class="card-body">
                    
                        <div class="row mb-3">
                            <label for="hoy" class="col-md-4 col-form-label text-md-end">{{ __('Balance Hoy') }}</label>

                            <div class="col-md-6">
                                <input id="hoy" type="number" class="form-control" name="hoy"  autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ayer" class="col-md-4 col-form-label text-md-end">{{ __('Balance Ayer') }}</label>

                            <div class="col-md-6">
                                <input id="ayer" type="number" class="form-control" name="ayer"  autofocus>
                            </div>
                        </div>
                        
                                                                        
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary" onclick="sumar()">
                                    {{ __('Calcular') }}
                                </button>
                            </div>
                        </div>

                        <div class="row mb-3 p-4">
                            <div  id="suma"></div>
                        </div>

                        
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

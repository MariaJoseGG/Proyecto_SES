@extends('layouts.app')

@section('content')
<div class="container w-100 bg-primary bg-opacity-75 border border-info text-center text-white">
    <p class="mx-4 my-4 fs-5">
        <b>
            PÁGINA PRINCIPAL
        </b>
        <br>
        Inicio
    </p>
</div>

@if( Auth::guest() )
<!-- Si no se ha iniciado sesión, muestra la vista normal -->
@else
<!-- Si es Auxiliar de enfermería -->
@if(Auth::user()->tipo_usuario === 0)
<div class="container pt-3 text-center w-25">
    <a href="{{ route('auxiliar.index') }}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item-success">Volver al Home</a>
</div>
@else
<!-- Si es un Administrador -->
<div class="container pt-3 text-center w-25">
    <a href="{{ route('home') }}" class="rounded-pill p-2 list-group-item list-group-item-action list-group-item-success">Volver al Home</a>
</div>
@endif
@endif

<div class="text-center p-3">
    <img class="img-fluid" src="{{ asset('img/hospital.jpg') }}" alt="Hospital Universitario de Caldas">
</div>

<div class="container p-3">
    <h4 style="color: rgb(19, 166, 220);" class="text-center">Glosario</h4>
    <p class="fs-6">
        <strong>Drogas vasoactivas:</strong> son aquellas que se usan para regular la frecuencia cardíaca, por medio del estrechamiento o ensanchamiento de los vasos sanguíneos. Como estas pueden afectar la circulación del paciente, <em>“… es necesario realizar monitorización hemodinámica, invasiva, durante la utilización de esas sustancias…”</em> (Enfermagem Ilustrada, 2019). Estas drogas se le suministran al paciente y se encuentran en mg/ml, pero hay que hacer su respectiva conversión a mcar-cc antes de ser diligenciadas en el control de líquidos.
    </p>
    <p class="fs-6">
        <strong>Escala de Braden:</strong> es una escala usada para <em>“… medir, de una forma concreta y objetiva, el riesgo de aparición de úlceras por presión en los pacientes”</em> (Ocronos, 2019), las cuales se pueden producir por estar un tiempo prolongado en reposo, por algún roce, por exposición a la humedad, entre otros factores. Esta escala se mide en función de seis aspectos, cada uno con puntuación de 1 a 4, y el riesgo se podrá dividir entre: bajo (15 puntos o más), moderado o intermedio (13 o 14 puntos), y alto o elevado (menos de 12 puntos).
    </p>
    <p class="fs-6">
        <strong>Escala Morse:</strong> <em>“es una herramienta rápida y simple para evaluar la probabilidad de que un paciente sufra una caída”</em> (Aesculap Seguridad del Paciente, 2012), y dependiendo del valor calculado, el personal de enfermería sabrá qué acciones llevar a cabo. Algunos de los aspectos que son considerados en esta escala son: antecedentes de caídas; si se utiliza algún tipo de ayuda para caminar como lo son muletas o bastones; si tiene líquidos intravenosos; entre otros. Dependiendo del puntaje calculado por el auxiliar de enfermería, teniendo en cuenta los aspectos mencionados, los niveles de riesgo son: sin riesgo (0 – 24), riesgo bajo (25 – 50) y riesgo alto (mayor o igual a 51).
    </p>
    <p class="fs-6">
        <strong>Hemodinámica:</strong> <em>“Estudio de los aspectos físicos relacionados con el movimiento de la circulación sanguínea a través del sistema cardiovascular”</em> (Clínica Universidad de Navarra, 2019). Se refiere al estudio del flujo de la sangre y los valores adecuados para que este se mantenga constante, lo cual asegura que las células desempeñen sus funciones de forma correcta.
    </p>
    <p class="fs-6">
        <strong>Pérdida INSEN:</strong> las pérdidas insensibles <em>“Son las pérdidas de líquidos que no son objetivables o evidentes y que por lo tanto no se pueden medir con exactitud”</em> (Enfermería Intensiva Top, 2020); por ejemplo: el calor, la sudoración, o aquellos líquidos que se puedan producir por la evaporación. Entonces, se utiliza un número constante de aproximadamente 100 ml por día. En el sistema, este dato se debe registrar como una de las salidas del control de líquidos.
    </p>
</div>
@endsection
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <style>
        h1{
        text-align: center;
        text-transform: uppercase;
        }
        .contenido{
        font-size: 20px;
        }
        #primero{
        background-color: #ccc;
        }
        #segundo{
        color:#44a359;
        }
        #tercero{
        text-decoration:line-through;
        }
    </style>
    </head>
    <body>
        <ul>
            <p>HORA&nbsp;&nbsp;&nbsp;&nbsp;ENTRADA</p>
            @foreach ($fluids as $fluid)
                @if ($fluid->input != null)
                    <li>{{ $fluid->hour }}:00&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $fluid->input }} mg</li>
                @endif
            @endforeach
        </ul>
    </body>
</html>
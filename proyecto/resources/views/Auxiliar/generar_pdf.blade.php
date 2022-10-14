    <table>
        <thead>
            <tr style="background-color: #abdbe3;">
                <th scope="col">Tipo de documento</th>
                <th scope="col">Documento</th>
                <th scope="col">Nombre</th>
                <th scope="col">Sexo</th>
                <th scope="col">Edad</th>
                <th scope="col">Cama</th>
                <th scope="col">Fecha de ingreso</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($paciente as $paciente)
            @if($paciente->estado==="Activo")
            <tr style="background-color: #ddf1f4;">
                <td>{{$paciente->tipoDoc}}</td>
                <td>{{$paciente->documento}}</td>
                <td>{{$paciente->nombre}}</td>
                <td>{{$paciente->sexo}}</td>
                <td>{{$paciente->edad}}</td>
                <td>{{$paciente->cama}}</td>
                <td>{{$paciente->fechaIngreso}}</td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
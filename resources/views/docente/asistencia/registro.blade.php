<html>
<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css"
          integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
          crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
          integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ"
          crossorigin="anonymous"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        body,html {
            font-family: sans-serif;
            background-color: white;
        }
    </style>
</head>
<body>
<div class="card" style="background-color: white;">
    <div style="background-color: white;">
        <br>
        <h2 style="text-align: center;">Lista de asistencia</h2>
        <h3 style="text-align: center;">Jardin de Niños: "Profa. Ma. Luisa Ballina Escartin" </h3>
        <img class="card-img-top" src="{{ asset('img/niños.png') }}" alt="Card image" style="width:100%">
        <div class="card-body" style="background-color: white;">
            <h5 style="float:right;"><i class="fa fa-calendar"></i><span> {{ $fecha_elegida }}</span></h5>
            <div class="row">
                <div class="col-md-6">
                    <h5>Codigo de Grupo </h5>
                    <p>{{ $docente->grupo->id }}</p>
                </div>
            </div>
            <table>
                <tbody>
                <tr>
                    <td style="margin-right: 25px;padding-right: 20px;">
                        <h5>Nombre de Docente: </h5>
                        <p>{{ $docente->nombre.' '.$docente->apellidoP.' '.$docente->apellidoM }}</p>
                    </td>
                    <td style="margin-right: 25px;padding-right: 20px;">
                        <h5>Grado: </h5>
                        <p>{{ $docente->grupo->grado }}</p>
                    </td>
                    <td style="padding-right: 10px;">
                        <h5>Aula: </h5>
                        <p>{{ $docente->grupo->aula }}</p>
                    </td>
                </tr>
                </tbody>
            </table>

            <table class="table" id="lista_asistencias">
                <thead class="thead-default">
                <tr>
                    <th>No. Control</th>
                    <th>Nombre Completo</th>
                    <th>Asistencia</th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $student)
                    <tr>
                        <td>{{ $student->alumnos->no_control }}</td>
                        <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                        <td>
                            @if( $student->alumnos->asistencias->where('fecha',$fecha_elegida)->first()->asistio == "si" )
                                <button class="btn btn-sm btn-success"
                                        title="Asistio">
                                    <i class="fa fa-check"></i>
                                </button>
                            @else
                                <button class="btn btn-sm btn-danger"
                                        title="No asistio">
                                    <i class="fa fa-remove"></i>
                                </button>
                            @endif
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>
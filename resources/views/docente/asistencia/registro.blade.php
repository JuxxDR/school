<html>
<head>
    <style>
        body, html {
            font-family: sans-serif;
            background-color: white;
            font-size: 10pt;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            text-align: left;
            padding: 8px;
        }

        table, th, td {
            border: 1px solid black;
        }

        td {
            height: 15px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
        }
    </style>
</head>
<body>
<div style="width: 100%;background-color: #777;">
    <img src="{{ asset('img/ENCABEZADO3.jpg') }}" align=center width="100%" height="60%">
</div>
<hr>
<div style="background-color: white;">
    <h3 style="text-align: center;">Registro de Asistencia Diaria</h3>
    <p style="float:right;"><b>Fecha</b>: <i class="fa fa-calendar"></i><span> {{ $fecha_elegida }}</span></p>
    <p><b>Codigo de Grupo</b>: {{ $docente->grupo->id }}</p>
    <p><b>Docente</b>: {{ $docente->nombre.' '.$docente->apellidoP.' '.$docente->apellidoM }}</p>
    <p><b>Grado</b>: {{ $docente->grupo->grado }} <b> Aula</b>: {{$docente->grupo->aula}}</p>

    <table id="lista_asistencias" style="width: 100%;border: black">
        <thead>
        <tr>
            <th style="width: 100px;">No. Control</th>
            <th>Nombre Completo</th>
            <th style="width: 20px;">Si</th>
            <th style="width: 20px;">No</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{ $student->alumnos->no_control }}</td>
                <td>{{ $student->alumnos->nombre .' '. $student->alumnos->apellidoP .' '. $student->alumnos->apellidoM }}</td>
                <td style="text-align: center">
                    @if( $student->alumnos->asistencias->where('fecha',$fecha_elegida)->first()->asistio == "si" )
                        <?php
                        $si = $si + 1;
                        ?>
                            <img src="{{ asset('img/check.png') }}" align=center width="100%">
                    @endif
                </td>
                <td style="text-align: center">
                    @if( $student->alumnos->asistencias->where('fecha',$fecha_elegida)->first()->asistio == "no" )
                        <?php
                        $no = $no + 1;
                        ?>
                            <img src="{{ asset('img/check.png') }}" align=center width="100%">
                    @endif
                </td>
            </tr>
        @endforeach
        <tr>
            <td style="text-align: right"><b>Total</b></td>
            <td style="text-align: right">{{ $numero_alumnos }}</td>
            <td style="text-align: right">{{ $si }}</td>
            <td style="text-align: right">{{ $no }}</td>
        </tr>
        </tbody>
    </table>
</div>
</body>
</html>
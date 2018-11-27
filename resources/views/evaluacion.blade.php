<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        #leng, #des2, #pen, #exp, #des, #asistencias {
            font-family: arial, sans-serif;
            font-size: 11pt;
            border-collapse: collapse;
            width: 100%;
        }

        #leng td, #leng th, #des2 td, #des2 th, #pen td, #pen th, #exp td, #exp th, #des td, #des th, #asistencias td, #asistencias th {
            border: 1px solid black;
            text-align: left;
            padding: 8px;
        }

        p {
            font-size: 12pt;
        }
    </style>
</head>
<body>
<div style="width: 100%;background-color: #777;">
    <img src="{{ asset('img/ENCABEZADO3.jpg') }}" align=center width="100%" height="50%">
</div>
<hr>
<h3 style="text-align: center;">Reporte de Evaluación</h3>
<p style="text-align: justify;">El Jardin de Niños Profra. Ma.Luisa Ballina Escartin es una institucion cuya mision es
    brindar un servicio educativo
    de calidad, en donde directivos y docentes, están comprometidos, a lograr los propósitos fundamentales de la
    educación preescolar. </p>
<h5 style="font-size: 12pt;">Datos Personales</h5>
<table id="datos_personales" style="text-align: center;">
    <tr>
        <th style="width: 145px;border-bottom: 1px #dddddd">{{ $student->apellidoP }}</th>
        <th></th>
        <th style="width: 145px;border-bottom: 1px #dddddd">{{ $student->apellidoM }}</th>
        <th></th>
        <th style="width: 170px;border-bottom: 1px #dddddd">{{ $student->nombre }}</th>
        <th></th>
        <th style="width: 200px;border-bottom: 1px #dddddd">{{ $student->curp }}</th>
        <th></th>
    </tr>
    <tr>
        <th style="font-size: 11pt;color: #4e555b">Apellido Paterno</th>
        <th style="padding-right: 14px;"></th>
        <th style="font-size: 11pt;color: #4e555b">Apellido Materno</th>
        <th style="padding-right: 14px;"></th>
        <th style="font-size: 11pt;color: #4e555b">Nombre</th>
        <th style="padding-right: 14px;"></th>
        <th style="font-size: 11pt;color: #4e555b">CURP</th>
        <th style="padding-right: 14px;"></th>
    </tr>
</table>

<h5 style="font-size: 12pt;">Avances del Alumno</h5>
<table id="leng">
    <tr>
        <td colspan="2"><b>Lenguaje y Comunicación</b></td>
    </tr>
    <tr>
        <td style="width: 100px;">Noviembre</td>
        <td style="background-color: #f2f2f2">
            @if($evaluaciones->where('materia_id',1)->where('trimestre',1)->first())
                {{ $evaluaciones->where('materia_id',1)->where('trimestre',1)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Marzo</td>
        <td>
            @if($evaluaciones->where('materia_id',1)->where('trimestre',2)->first())
                {{ $evaluaciones->where('materia_id',1)->where('trimestre',2)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Julio</td>
        <td style="background-color: #f2f2f2">
            @if($evaluaciones->where('materia_id',1)->where('trimestre',3)->first())
                {{ $evaluaciones->where('materia_id',1)->where('trimestre',3)->first()->evaluacion }}
            @endif
        </td>
    </tr>
</table>
<br>
<table id="pen">
    <tr>
        <td colspan="2"><b>Pensamiento matematico</b></td>
    </tr>
    <tr>
        <td style="width: 100px;">Noviembre</td>
        <td>
            @if($evaluaciones->where('materia_id',2)->where('trimestre',1)->first())
                {{ $evaluaciones->where('materia_id',2)->where('trimestre',1)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Marzo</td>
        <td style="background-color: #f2f2f2">
            @if($evaluaciones->where('materia_id',2)->where('trimestre',2)->first())
                {{ $evaluaciones->where('materia_id',2)->where('trimestre',2)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Julio</td>
        <td>
            @if($evaluaciones->where('materia_id',2)->where('trimestre',3)->first())
                {{ $evaluaciones->where('materia_id',2)->where('trimestre',3)->first()->evaluacion }}
            @endif
        </td>
    </tr>
</table>
<br>
<table id="exp">
    <tr>
        <td colspan="2"><b>Exploración y Conocimiento del Mundo</b></td>
    </tr>
    <tr>
        <td style="width: 100px;">Noviembre</td>
        <td style="background-color: #f2f2f2">
            @if($evaluaciones->where('materia_id',3)->where('trimestre',1)->first())
                {{ $evaluaciones->where('materia_id',3)->where('trimestre',1)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Marzo</td>
        <td>
            @if($evaluaciones->where('materia_id',3)->where('trimestre',2)->first())
                {{ $evaluaciones->where('materia_id',3)->where('trimestre',2)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Julio</td>
        <td style="background-color: #f2f2f2">
            @if($evaluaciones->where('materia_id',3)->where('trimestre',3)->first())
                {{ $evaluaciones->where('materia_id',3)->where('trimestre',3)->first()->evaluacion }}
            @endif
        </td>
    </tr>
</table>
<br>
<table id="des">
    <tr>
        <td colspan="2"><b>Desarrollo Fisico y Salud</b></td>
    </tr>
    <tr>
        <td style="width: 100px;">Noviembre</td>
        <td>
            @if($evaluaciones->where('materia_id',4)->where('trimestre',1)->first())
                {{ $evaluaciones->where('materia_id',4)->where('trimestre',1)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Marzo</td>
        <td style="background-color: #f2f2f2">
            @if($evaluaciones->where('materia_id',4)->where('trimestre',2)->first())
                {{ $evaluaciones->where('materia_id',4)->where('trimestre',2)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Julio</td>
        <td>
            @if($evaluaciones->where('materia_id',4)->where('trimestre',3)->first())
                {{ $evaluaciones->where('materia_id',4)->where('trimestre',3)->first()->evaluacion }}
            @endif
        </td>
    </tr>
</table>
<br>
<table id="des2">
    <tr>
        <td colspan="2"><b>Desarrollo Personal y Social</b></td>
    </tr>
    <tr>
        <td style="width: 100px;">Noviembre</td>
        <td style="background-color: #f2f2f2">
            @if($evaluaciones->where('materia_id',5)->where('trimestre',1)->first())
                {{ $evaluaciones->where('materia_id',5)->where('trimestre',1)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Marzo</td>
        <td>
            @if($evaluaciones->where('materia_id',5)->where('trimestre',2)->first())
                {{ $evaluaciones->where('materia_id',5)->where('trimestre',2)->first()->evaluacion }}
            @endif
        </td>
    </tr>
    <tr>
        <td>Julio</td>
        <td style="background-color: #f2f2f2">
            @if($evaluaciones->where('materia_id',5)->where('trimestre',3)->first())
                {{ $evaluaciones->where('materia_id',5)->where('trimestre',3)->first()->evaluacion }}
            @endif
        </td>
    </tr>
</table>
<br>
<table id="asistencias">
    <tr>
        <td rowspan="2" style="background-color: #f2f2f2;text-align: center;">Inasistencias</td>
        <td style="padding-bottom: 0px;text-align: center;">{{ $inasistencias }}</td>
        <td rowspan="2" style="background-color: #f2f2f2;text-align: center;">Registro de Tareas</td>
        <td style="padding-bottom: 0px;text-align: center;">{{ $aceptable }}</td>
        <td style="padding-bottom: 0px;text-align: center;">{{ $medio }}</td>
        <td style="padding-bottom: 0px;text-align: center;">{{ $deficiente }}</td>
        <td style="padding-bottom: 0px;text-align: center;">{{ $no_entrego }}</td>
        <td rowspan="2" style="text-align: center;background-color: #f2f2f2">Concluye {{ $student->grado }}° grado</td>
    </tr>
    <tr>
        <td style="background-color: #f2f2f2;border-right: 1px black;text-align: center;">Total</td>
        <td style="background-color: #f2f2f2;text-align: center;">Aceptable</td>
        <td style="background-color: #f2f2f2;text-align: center;">Medio</td>
        <td style="background-color: #f2f2f2;text-align: center;">Deficiente</td>
        <td style="background-color: #f2f2f2;text-align: center;">Sin entrega</td>
    </tr>
</table>
</body>
</html>
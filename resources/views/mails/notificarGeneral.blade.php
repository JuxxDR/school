<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Anuncio General</title>
</head>
<body>
<p>Hola! Tienes un nuevo anuncio de la escuela publicado a las {{ $anuncioGeneral->created_at }}.</p>
<p>Datos del alumno:</p>
<ul>
    <li>Nombre: {{ $student->nombre.' '.$student->apellidoP.' '.$student->apellidoM }}</li>
    <li>No. Control: {{ $student->no_control }}</li>
</ul>
<p>Esta es la informacion del anuncio publicado:</p>
<ul>
    <li>Nombre: {{ $anuncioGeneral->nombre }}</li>
    <li>Importancia: @if($anuncioGeneral->importancia==1) Alta @elseif($anuncioGeneral->importancia==2) Media @else Baja @endif</li>
    <li>Descripcion: {{ $anuncioGeneral->informacion }}</li>
    <li>Observaciones: {{ $anuncioGeneral->observaciones }}</li>
</ul>
</body>
</html>
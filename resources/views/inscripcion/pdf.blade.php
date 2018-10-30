@php
    /* @var $alumno \App\Model\Alumno*/
@endphp
        <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/configuration.png') }}" type="image/png">
    <title>@yield('title')</title>
    <!-- Style sheets -->
    @include('template.global_css')
    @stack('css')
</head>
<body>
<img src="{{asset('img/ENCABEZADO.jpg')}}" alt="encabezado" width="100%">
@include('inscripcion._body_pdf')
<p>
    Aqui la metes
    :3
</p>
<p>
<h4>Porfavor guarda la siguiente información</h4>
<h5><b>No. Control: </b> {{$alumno->no_control}} </h5>
<h5><b>Contraseña: </b> {{$alumno->password}} </h5>
</p>

@include('template.global_js')
@stack('scripts')
</body>
</html>
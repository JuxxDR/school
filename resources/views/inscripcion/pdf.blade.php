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
    <title>Comprobante_Inscripción_{{$alumno->nombre}}_{{$alumno->apellidoP}}_{{$alumno->apellidoM}}</title>
    <!-- Style sheets -->
    @include('template.global_css')

    <style>
        .new_page {
            page-break-before: always;
        }

        table {
            margin-top: 20px;
            width: 100%;
            border-collapse: collapse;
        }

        table, td, th {
            border: 1px solid black;
        }

        P {
            margin-top: 20px;
        }

        body {
            font-family: Arial, Arial, sans-serif !important;
            color: black;
            background-color: white !important
        }

        .header {
            background-image: {{asset('img/tu imagen.png')}};
        }

        _

    </style>
</head>
<body>
<img src="{{asset('img/ENCABEZADO.jpg')}}" alt="encabezado" width="100%">
@include('inscripcion._body_pdf')
@include('template.global_js')
@stack('scripts')
</body>
</html>
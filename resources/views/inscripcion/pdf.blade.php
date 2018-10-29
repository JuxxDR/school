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
    @include('inscripcion._body_pdf')

@include('template.global_js')
@stack('scripts')
</body>
</html>
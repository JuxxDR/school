<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/configuration.png') }}" type="image/png">
    <title>@yield('title')</title>
    <!-- Style sheets -->
    @include('template.aaron.estilo')
    @stack('css')
</head>
<body>
<center>
    <img src="{{ asset('img/chido2.png') }}" align=center width="80%" HEIGHT="100px">
</center>
@include('components.aaron.navbar')
<div class="wrapper">
    @if(auth()->check())
        @include('components.aaron.menu')
    @endif
    @yield('content')
</div>
@include('components.footer')

<!-- Javascript -->
@include('template.aaron.scripts')
@stack('scripts')
@yield('scripts')
</body>
</html>
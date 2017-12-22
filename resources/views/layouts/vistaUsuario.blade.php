<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    @if(!isset($_COOKIE['tema']))
        {!! $_COOKIE['tema'] = 1 !!}
    @endif

    @if(isset($_COOKIE['tema']) and $_COOKIE['tema'] == 2)
        <link id="refEstilos" href="{{asset('css/estilos2.css')}}" rel="stylesheet">
    @elseif(isset($_COOKIE['tema']) and $_COOKIE['tema'] == 3)
        <link id="refEstilos" href="{{asset('css/estilos3.css')}}" rel="stylesheet">
    @else
        <link id="refEstilos" href="{{asset('css/estilos.css')}}" rel="stylesheet">
    @endif
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">

</head>
<body>
@include('layouts.menu')
<section class="main">
    <div class="container">
        <div class="mensaje">
            <h2>Bienvenido!</h2>
        </div>

        <div class="articulo">
            @yield('contenido')
        </div>
    </div>
</section>
<footer class="navbar-fixed-bottom">

</footer>
</body>
</html>
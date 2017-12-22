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


        @yield('contenido')


    </div>
</section>

<script src="{{asset('libraries/jQuery/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('libraries/js.cookie.js')}}"></script>
<script src="{{asset('libraries/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('libraries/vis/js/vis.min.js')}}"></script>
<script src="{{asset('plugins/chartjs/Chart.js')}}"></script>
<script src="{{asset('plugins/chartjs/Chart.js/Chart.min.js')}}"></script>

<script src="{{asset('libraries/js.cookie.js')}}"></script>
<script src="{{asset('js/app.min.js')}}"></script>
<script type="application/javascript">
    $('#tema1').click(function () {
        Cookies.set('tema', 1);
        location.reload();
    });
    $('#tema2').click(function () {
        Cookies.set('tema', 2);
        location.reload();
    });
    $('#tema3').click(function () {
        Cookies.set('tema', 3);
        location.reload();
    });
</script>
</body>
<footer class="navbar-fixed-bottom">

</footer>
</html>
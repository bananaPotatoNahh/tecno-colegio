<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="./favicon.ico">

    <title>@yield("title","Acropolis")</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('libraries/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('libraries/vis/css/vis.min.css')}}" rel="stylesheet">

    @if(isset($_COOKIE['tema']) and $_COOKIE['tema'] == 2)
        <link id="refEstilos" href="{{asset('assets/css/theme2.css')}}" rel="stylesheet">
    @elseif(isset($_COOKIE['tema']) and $_COOKIE['tema'] == 3)
        <link id="refEstilos" href="{{asset('assets/css/theme3.css')}}" rel="stylesheet">
    @else
        {{$_COOKIE['tema'] = 1}}
        <link id="refEstilos" href="{{asset('assets/css/theme1.css')}}" rel="stylesheet">
    @endif

<!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 50px;
            padding-bottom: 20px;
        }
    </style>

</head>

<body>

@include("layouts.menu")

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="backgroud-back">
    <div class="backgroud-top">
        <div class="container">
            @yield("contenido")
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{asset('libraries/jQuery/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('libraries/js.cookie.js')}}"></script>
<script src="{{asset('libraries/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('libraries/vis/js/vis.min.js')}}"></script>
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
@yield("scripts")
</body>
</html>
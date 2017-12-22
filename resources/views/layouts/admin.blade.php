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
<nav class="navbar navbar-default nuevocolor">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Esto </a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <!-- los dropdown se usan para hacer menus desplegables bootstrap 3 -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="{{url('portal/datosportal')}}">Inicio</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Portal <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="{{url('portal/datosportal')}}">Datos del Portal</a></li>
                        <li><a href="{{url('portal/normas')}}">normas</a></li>

                        <li><a href="{{url('portal/noticias')}}">noticias</a></li>

                        <li><a href="{{url('portal/logros')}}">logros</a></li>


                        <li><a href="{{url('portal/reglamento')}}">reglamento</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Persona <span class="caret"></span></a>
                    <ul class="dropdown-menu">

                        <li><a href="{{url('persona/persona')}}">Estudiantes</a></li>

                        <li><a href="{{url('persona/docente')}}">Docentes</a></li>

                        <li><a href="{{url('persona/administrativo')}}">Administrativos</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Plan Estudio <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('planestudio/materias')}}">Materia</a></li>
                        <li><a href="{{url('planestudio/planestudio')}}">Plan de Estudio</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Estadisticas <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('planestudio/materias')}}">Visitas Publicas</a></li>
                        <li><a href="{{url('planestudio/planestudio')}}">Visitas Internas</a></li>
                        <li><a href="{{url('planestudio/planestudio')}}">Registro de personas</a></li>
                        <li><a href="{{url('planestudio/planestudio')}}">Registro de Usuarios</a></li>
                        <li><a href="{{url('planestudio/planestudio')}}">Registros de Portal</a></li>

                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Tema <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" id="tema1">Tema 1</a></li>
                        <li><a href="#" id="tema2">Tema 2</a></li>
                        <li><a href="#" id="tema3">Tema 3</a></li>
                    </ul>
                </li>
                <li><a href="{{url('reportes')}}">Reportes</a></li>
                @include('layouts.searcht')
            </ul>


            <ul class="nav navbar-nav navbar-right">
                @if(session('login'))
                    <li><a>{{session('username')}}</a></li>
                    <li><a href="{{ url("logout") }}">Cerrar Sesion</a></li>
                @else
                    <li>
                        <form action="{{ url("login") }}" method="post" class="navbar-form navbar-right">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <input required type="email" placeholder="Email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <input required type="password" placeholder="Password" class="form-control"
                                       name="password">
                            </div>
                            <button type="submit" class="btn btn-success">Entrar</button>
                        </form>
                    </li>
                @endif
            </ul>


        </div><!-- /.navbar-collapse -->


    </div><!-- /.container-fluid -->
</nav>

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
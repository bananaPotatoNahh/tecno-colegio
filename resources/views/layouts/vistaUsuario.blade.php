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
<header>
    <div class="container">

        <nav>
            <ul class="nav navbar-nav">
                <li><a href="{{url('vistapublica')}}">Inicio</a></li>
                <li><a href="blog.html">Plantel Administrativo</a></li>
                <li><a href="url">Pantel Docente</a></li>
                <li><a href="url">Estudiantes</a></li>
                <li><a href="url">Planes de Estudio</a></li>
                <li><a href="url">Contacto</a></li>
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
        </nav>
    </div>
</header>
<section class="main">
    <div class="container">
        <div class="mensaje">
            <h2>Bienvenido!</h2>
        </div>

        <div class="articulo">
            @yield('contenido')
        </div>

        <aside>
            <div class="widget">
                <h3>Leer Para mas  informacion</h3>
                <ul>
                    <li><a href="{{url('reglamentospublica')}}">Reglamentos</a></li>
                    <li><a href="{{url('normaspublica')}}">Normas</a></li>
                    <li><a href="{{url('noticiaspublica')}}">Noticias</a></li>
                    <li><a href="{{url('logrospublica')}}">Logros</a></li>
                    <li><a href="{{url('curriculumpublica')}}">Curriculum</a></li>
                    <li ><a href="{{url('reportes')}}">Reportes</a></li>
                </ul>
            </div>

        </aside>
    </div>
</section>
<footer class="navbar-fixed-bottom">

</footer>
</body>
</html>
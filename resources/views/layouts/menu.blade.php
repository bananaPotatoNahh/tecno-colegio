<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                    aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url("/") }}">Colegio Belen</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">

            <ul class="nav navbar-nav">
                @if(session('login'))
                    @if(session('rol') == "ADMINISTRATIVO")
                        <li><a href="#">ADMINISTRATIVO</a></li>
                    @endif
                    @if(session('rol') == "PROFESOR")
                        <li><a href="#">PROFESOR</a></li>
                    @endif
                    @if(session('rol') == "ADMIN")
                        <li><a href="{{ url("portal/datosportal") }}">Inicio</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">Persona <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url("persona/administrativo") }}">Administrativo</a></li>
                                <li><a href="{{ url("persona/docente") }}">Docente</a></li>
                                <li><a href="{{ url("persona/curriculum") }}">Curriculum</a></li>
                                <li><a href="{{ url("persona/persona") }}">Alumno</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">Persona <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url("portal/normas") }}">Normas</a></li>
                                <li><a href="{{ url("portal/reglamento") }}">Reglamento</a></li>
                                <li><a href="{{ url("portal/logros") }}">Logros</a></li>
                                <li><a href="{{ url("portal/noticias") }}">Noticias</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true"
                               aria-expanded="false">Persona <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ url("planestudio/planestudio") }}">Plan de Estudio</a></li>
                                <li><a href="{{ url("planestudio/materias") }}">Materias</a></li>
                            </ul>
                        </li>

                    @endif
                @endif
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Tema <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#" id="tema1">Tema 1</a></li>
                        <li><a href="#" id="tema2">Tema 2</a></li>
                        <li><a href="#" id="tema3">Tema 3</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(session('login'))
                    <li><a>{{session('email')}}</a></li>
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
        </div><!--/.navbar-collapse -->
    </div>
</nav>
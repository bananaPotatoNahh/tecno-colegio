@extends("layouts.principal")

@section("contenido")
    <div class="jumbotron">
        <div class="container">
            <h1>Bienvenido a Colegio Belen!</h1>
            <p>Nuestro sistema que administra toda la parte del Portal de nuestra institucion, tanto la parte
                de alumnos, como de profesores que imparten en nuestra institucion.</p>
        </div>
    </div>
    <div class="container">

        <p>Visitas: {{$cantidad}}
        <p>

            <footer>
        <p>&copy; 2017 Colegio Belen</p>
        </footer>
    </div> <!-- /container -->
@endsection
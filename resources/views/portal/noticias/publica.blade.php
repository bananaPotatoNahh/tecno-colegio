@extends('layouts.vistaUsuario')
@section('contenido')
    <div class="mensaje">

        <h2>  Noticias</h2>
    </div>


        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>titulo</th>
                    <th>descripcion</th>

                    </thead>
                    @foreach($noticias as $not)
                        <tr>

                            <td>{{$not->titulo}}</td>
                            <td>{{$not->descripcion}}</td>


                        </tr>

                    @endforeach
                </table>
            </div>
            {{$noticias->render()}}
        </div>


        <p>Vistas: {{$cantidad}}</p>


@endsection


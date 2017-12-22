@extends('layouts.vistaUsuario')
@section('contenido')


    <div class="mensaje">

        <h2>Logros</h2>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>titulo</th>
                    <th>descripcion</th>

                    </thead>
                    @foreach($logros as $log)
                        <tr>

                            <td>{{$log->titulo}}</td>
                            <td>{{$log->descripcion}}</td>


                        </tr>

                    @endforeach
                </table>
            </div>
            {{$logros->render()}}
        </div>


        <p>Vistas: {{$cantidad}}</p>


@endsection


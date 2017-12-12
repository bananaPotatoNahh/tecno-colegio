@extends('layouts.admin')
@section('contenido')
    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Logros </h3>
            @include('portal.logros.search')

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>id</th>
                    <th>titulo</th>
                    <th>descripcion</th>
                    </thead>
                    @foreach($logros as $log)
                        <tr>
                            <td>{{$log->idlogros}} </td>
                            <td>{{$log->titulo}}</td>
                            <td>{{$log->descripcion}}</td>
                            <td>
                                <a href=""></a>
                                <button class="btn btn-info">Editar</button>
                                <a href=""></a>
                                <button class="btn btn-danger">Eliminar</button>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
            {{$logros->render()}}
        </div>


    </div>

@endsection


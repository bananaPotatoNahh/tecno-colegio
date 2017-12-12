@extends('layouts.admin')
@section('contenido')
    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Logros <a href="logros/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
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
                                <a href="{{URL::action('LogrosController@edit',$log->idlogros)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$log->idlogros}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('portal.logros.modal')
                    @endforeach
                </table>
            </div>
            {{$logros->render()}}
        </div>


    </div>

@endsection


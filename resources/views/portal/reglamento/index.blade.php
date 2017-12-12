@extends('layouts.admin')
@section('contenido')
    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Reglamentos <a href="reglamento/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('portal.reglamento.search')

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>id</th>
                    <th>codigo</th>
                    <th>descripcion</th>
                    </thead>
                    @foreach($reglamentos as $reg)
                        <tr>
                            <td>{{$reg->idreglamento}} </td>
                            <td>{{$reg->codigo}}</td>
                            <td>{{$reg->descripcion}}</td>
                            <td>
                                <a href="{{URL::action('ReglamentosController@edit',$reg->idreglamento)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$reg->idreglamento}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('portal.reglamento.modal')
                    @endforeach
                </table>
            </div>
            {{$reglamentos->render()}}
        </div>


    </div>

@endsection


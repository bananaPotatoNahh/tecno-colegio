@extends('layouts.admin')
@section('contenido')
    <div class="mensaje">

        <h2> Listado de Reglamentos</h2>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <h3> <a href="reglamento/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('portal.reglamento.search')

        </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>id</th>
                    <th>codigo</th>
                    <th>descripcion</th>
                    <th>opciones</th>
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

        <p>Vistas: {{$cantidad}}</p>

    </div>

@endsection


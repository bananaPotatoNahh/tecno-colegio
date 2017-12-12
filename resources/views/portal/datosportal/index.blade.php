@extends('layouts.admin')
@section('contenido')
    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Portal <a href="create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('portal.datosportal.search')

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>id</th>
                    <th>nombre</th>
                    <th>mision</th>
                    <th>vision</th>
                    <th>objetivo general</th>
                    <th>descripcion</th>
                    <th>logo</th>
                    </thead>
                    @foreach($datosportal as $dat)
                        <tr>
                           
                            <td>{{$dat->idportal}} </td>
                            <td>{{$dat->nombre}}</td>
                            <td>{{$dat->mision}} </td>
                            <td>{{$dat->vision}}</td>
                            <td>{{$dat->objetivoGeneral}} </td>
                            <td>{{$dat->descripcion}}</td>
                            <td>{{$dat->logo}} </td>
                            <td>
                                <a href="{{URL::action('DatosPortalController@edit',$dat->idportal)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$dat->idportal}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('portal.datosportal.modal')
                    @endforeach
                </table>
            </div>
            {{$datosportal->render()}}
        </div>

        <p>Vistas: {{$cantidad}}</p>

    </div>

@endsection


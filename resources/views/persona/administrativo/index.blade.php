@extends('layouts.admin')
@section('contenido')
    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Administrativos <a href="create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('persona.administrativo.search')

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>id</th>
                    <th>nombre</th>
                    <th>apellido</th>
                    <th>direccion</th>
                    <th>numero documento</th>
                    <th>correo electronico</th>
                    <th>codigo</th>
                    <th>cargo</th>
                    </thead>
                    @foreach($administrativo as $per)
                        <tr>
                           
                            <td>{{$per->idadministrativo}} </td>
                            <td>{{$per->nombre}}</td>
                            <td>{{$per->apellido}} </td>
                            <td>{{$per->direccion}}</td>
                            <td>{{$per->numerodocumento}} </td>
                            <td>{{$per->correoelectronico}}</td>
                            <td>{{$per->codigo}} </td>
                            <td>{{$per->cargo }}</td>
                            <td>
                                <a href="{{URL::action('AdministrativoController@edit',$per->idadministrativo)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$per->idadministrativo}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('persona.administrativo.modal')
                    @endforeach
                </table>
            </div>
            {{$administrativo->render()}}
        </div>


    </div>

@endsection


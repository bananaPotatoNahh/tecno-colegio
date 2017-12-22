@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="mensaje">

            <h2>   Listado de Docentes</h2>
        </div>
        <div class=" col-md-8 col-sm-8 col-xs-12">

            <h3> <a href="docente/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('persona.docente.search')

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
                    <th>opciones</th>
                    </thead>
                    @foreach($personas as $dat)
                        <tr>
                           
                            <td>{{$dat->idpersona}} </td>
                            <td>{{$dat->nombre}}</td>
                            <td>{{$dat->apellido}} </td>
                            <td>{{$dat->direccion}}</td>
                            <td>{{$dat->numerodocumento}} </td>
                            <td>{{$dat->correoelectronico}}</td>
                            <td>{{$dat->codigo}} </td>
                            <td>
                                <a href="{{URL::action('DocenteController@edit',$dat->idpersona)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$dat->idpersona}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('persona.docente.modal')
                    @endforeach
                </table>
            </div>
            {{$personas->render()}}
        </div>
        <p>Vistas: {{$cantidad}}</p>


    </div>

@endsection


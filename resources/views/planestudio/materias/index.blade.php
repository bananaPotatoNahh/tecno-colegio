@extends('layouts.admin')
@section('contenido')
    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de materias <a href="materias/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('planestudio.materias.search')

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>id</th>
                    <th>nombre</th>
                    <th>sigla</th>
                    <th>contenido</th>
                    </thead>
                    @foreach($materias as $mat)
                        <tr>
                            <td>{{$mat->idmateria}} </td>
                            <td>{{$mat->nombre}}</td>
                            <td>{{$mat->sigla}}</td>
                            <td>{{$mat->contenido}}</td>
                            <td>
                                <a href="{{URL::action('MateriasController@edit',$mat->idmateria)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$mat->idmateria}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('planestudio.materias.modal')
                    @endforeach
                </table>
            </div>
            {{$materias->render()}}
        </div>


    </div>

@endsection


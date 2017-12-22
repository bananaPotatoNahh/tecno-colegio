@extends('layouts.admin')
@section('contenido')

        <div class="mensaje">

            <h2>  Listado de Normas</h2>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <h3> <a href="normas/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('portal.normas.search')

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
                    @foreach($normas as $nor)
                        <tr>
                            <td>{{$nor->idnorma}} </td>
                            <td>{{$nor->codigo}}</td>
                            <td>{{$nor->descripcion}}</td>
                            
                            <td>
                                <a href="{{URL::action('NormasController@edit',$nor->idnorma)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$nor->idnorma}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('portal.normas.modal')
                    @endforeach
                </table>
            </div>
            {{$normas->render()}}
        </div>


        <p>Vistas: {{$cantidad}}</p>
    </div>

@endsection


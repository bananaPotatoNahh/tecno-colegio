@extends('layouts.admin')
@section('contenido')
    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Cargo <a href="cargo/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('persona.cargo.search')

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>id</th>
                    <th>nombre</th>
                    </thead>
                    @foreach($cargo as $car)
                        <tr>
                            <td>{{$car->idcargo}} </td>
                            <td>{{$car->nombre}}</td>
                            <td>
                                <a href="{{URL::action('CargoController@edit',$car->idcargo)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$car->idcargo}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('persona.cargo.modal')
                    @endforeach
                </table>
            </div>
            {{$cargo->render()}}
        </div>


    </div>

@endsection


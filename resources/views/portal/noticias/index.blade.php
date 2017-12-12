@extends('layouts.admin')
@section('contenido')
    <div class="row">

        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Listado de Noticias <a href="noticias/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('portal.noticias.search')

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
                    @foreach($noticias as $not)
                        <tr>
                            <td>{{$not->idnoticia}} </td>
                            <td>{{$not->titulo}}</td>
                            <td>{{$not->descripcion}}</td>
                            <td>
                                <a href="{{URL::action('NoticiasController@edit',$not->idnoticia)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$not->idnoticia}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('portal.noticias.modal')
                    @endforeach
                </table>
            </div>
            {{$noticias->render()}}
        </div>


    </div>

@endsection


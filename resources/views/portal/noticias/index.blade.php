@extends('layouts.admin')
@section('contenido')
    <div class="mensaje">

        <h2> Listado de Noticias</h2>
    </div>
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            <h3> <a href="noticias/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('portal.noticias.search')

        </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>id</th>
                    <th>titulo</th>
                    <th>descripcion</th>
                    <th>opciones</th>
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


        <p>Vistas: {{$cantidad}}</p>
    </div>

@endsection


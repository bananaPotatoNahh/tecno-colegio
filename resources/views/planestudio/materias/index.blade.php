@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="mensaje">

            <h2>   Listado de Curriculum</h2>
        </div>
        <div class=" col-md-8 col-sm-8 col-xs-12">

            <h3> <a href="curriculum/create"><button  class="btn btn-bitbucket">Nuevo</button></a> </h3>
            @include('persona.curriculum.search')

        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>id</th>
                    <th>codigo</th>
                    <th>curriculum</th>
                    <th>opciones</th>
                    </thead>
                    @foreach($curriculum as $cur)
                        <tr>
                           
                            <td>{{$cur->idcurriculum}} </td>
                            <td>{{$cur->codigo}}</td>
                            <td>
                               < src="{{asset('pdf/curriculum/'.$cur->curriculum)}}" alt="{{$cur->curriculum}}"></>
                            </td>
                            <td>
                                <a href="{{URL::action('CurriculumController@edit',$cur->idcurriculum)}}">   <button class="btn btn-info">Editar</button>
                                </a>
                              <a href="" data-target="#modal-delete-{{$cur->idcurriculum}}" data-toggle="modal"> <button class="btn btn-danger">Eliminar</button>
                              </a>
                                </td>

                        </tr>
                        @include('persona.curriculum.modal')
                    @endforeach
                </table>
            </div>
            {{$curriculum->render()}}
        </div>
        <p>Vistas: {{$cantidad}}</p>


    </div>

@endsection


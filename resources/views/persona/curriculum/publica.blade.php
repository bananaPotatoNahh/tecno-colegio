@extends('layouts.vistaUsuario')
@section('contenido')


    <div class="row">
        <div class="mensaje">

            <h2>   Listado de Curriculum</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>
                    <th>codigo</th>
                    <th>curriculum</th>
                    </thead>
                    @foreach($curriculum as $cur)
                        <tr>

                            <td>{{$cur->codigo}}</td>
                            <td>
                                < src="{{asset('pdf/curriculum/'.$cur->curriculum)}}" alt="{{$cur->curriculum}}"></>
                            </td>

                        </tr>
                    @endforeach
                </table>
            </div>
            {{$curriculum->render()}}
        </div>
        <p>Vistas: {{$cantidad}}</p>


    </div>


@endsection


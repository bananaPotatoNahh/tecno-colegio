@extends('layouts.vistaUsuario')
@section('contenido')

    <div class="mensaje">

        <h2>   Normas</h2>
    </div>



        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="table-responsive">

                <table class="table table-striped table-bordered table-condensed table-hover">
                    <thead>

                    <th>codigo</th>
                    <th>descripcion</th>
                    </thead>
                    @foreach($normas as $nor)
                        <tr>

                            <td>{{$nor->codigo}}</td>
                            <td>{{$nor->descripcion}}</td>



                        </tr>

                    @endforeach
                </table>
            </div>
            {{$normas->render()}}
        </div>


        <p>Vistas: {{$cantidad}}</p>


@endsection


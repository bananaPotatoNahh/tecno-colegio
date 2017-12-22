@extends('layouts.vistaUsuario')
@section('contenido')

    @foreach($datosportal as $dat)
        <div class="mensaje">
            <h2>Colegio: {{$dat->nombre}}</h2>

        </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h3>mision:</h3>
                    <h2>{{$dat->mision}} </h2>
                    <h3>vision</h3>
                    <h2>{{$dat->vision}}</h2>
                    <h3>objetivo general</h3>
                    <h2>{{$dat->objetivoGeneral}} </h2>
                    <h3>descripcion</h3>
                    <h2>{{$dat->descripcion}}</h2>
                    <h3>logo</h3>
                    <h2>{{$dat->logo}} </h2>
                    @endforeach
                {{$datosportal->render()}}
            <p>Vistas: {{$cantidad}}</p>
        </div>


    </div>

@endsection


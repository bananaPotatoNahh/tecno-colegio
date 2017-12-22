@extends('layouts.vistaUsuario')
@section('contenido')

        <div class="mensaje">
            <h2>Colegio: {{$datosportal[0]->nombre}}</h2>

        </div>

    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                    <h2>mision:</h2>
                    <h4>{{$datosportal[0]->mision}} </h4>
                    <h2>vision</h2>
                    <h4>{{$datosportal[0]->vision}}</h4>
                    <h2>objetivo general</h2>
                    <h4>{{$datosportal[0]->objetivoGeneral}} </h4>
                    <h2>descripcion</h2>
                    <h4>{{$datosportal[0]->descripcion}}</h4>
                    <h2>logo</h2>
                    <h4>{{$datosportal[0]->logo}} </h4>
            <p>Vistas: {{$cantidad}}</p>
        </div>
    </div>

@endsection


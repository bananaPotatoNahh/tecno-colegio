@extends('layouts.admin')
@section('contenido')


            <div class="mensaje">

                <h2>Actualizar administrativo:{{$personas->nombre}}</h2>
            </div>
            <div class=" col-md-12 col-sm-12 col-xs-12">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($personas,['method'=>'PATCH','route'=>['persona.administrativo.update',$personas->idpersona]]) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$personas->nombre}}" placeholder="nombre">

                <label for="apellido">apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{$personas->apellido}}" placeholder="apellido">


                <label for="vision">direccion</label>
                <input type="text" name="direccion" class="form-control" value="{{$personas->direccion}}" placeholder="direccion">


                <label for="numerodocumento">numero documento</label>
                <input type="text" name="numerodocumento" class="form-control" value="{{$personas->numerodocumento}}" placeholder="numerodocumento">


                <label for="correoelectronico">correo electronico</label>
                <input type="text" name="correoelectronico" class="form-control" value="{{$personas->correoelectronico}}" placeholder="correoelectronico">


                <label for="codigo">codigo</label>
                <input type="text" name="codigo" class="form-control" value="{{$personas->codigo}}" placeholder="codigo">

            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" href="">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
            <p>Vistas: {{$cantidad}}</p>
        </div>

@endsection
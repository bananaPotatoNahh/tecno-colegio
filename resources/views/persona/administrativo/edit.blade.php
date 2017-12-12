@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Actualizar Alumno:{{$personas->codigo}}</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($personas,['method'=>'PATCH','route'=>['persona.persona.update',$personas->idpersona]]) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$personas->nombre}}" placeholder="nombre">

                <label for="apellido">apellido</label>
                <input type="text" name="apellido" class="form-control" value="{{$personas->apellido}}" placeholder="apellido">


                <label for="direccion">direccion</label>
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
        </div>
    </div>
@endsection
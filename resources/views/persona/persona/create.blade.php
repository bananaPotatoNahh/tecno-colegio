@extends('layouts.admin')
@section('contenido')
    <div class="mensaje">

        <h3>Nuevo Alumno</h3>
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
            {!! Form::open(array('url'=>'persona/persona','method'=>'POST','autocomplete'=>'off')) !!}
                {{Form::token()}}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="nombre">

                    <label for="apellido">apellido</label>
                    <input type="text" name="apellido" class="form-control" placeholder="apellido">

                    <label for="direccion">direccion</label>
                    <input type="text" name="direccion" class="form-control" placeholder="direccion">

                    <label for="numerodocumento">numero documento</label>
                    <input type="text" name="numerodocumento" class="form-control" placeholder="numerodocumento">

                    <label for="correoelectronico">correo electronico</label>
                    <input type="text" name="correoelectronico" class="form-control" placeholder="correoelectronico">


                    <label for="codigo">codigo</label>
                    <input type="text" name="codigo" class="form-control" placeholder="codigo">
                    <input type="hidden" name="tipo" class="form-control" placeholder="tipo" value="1">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" href="">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            {!! Form::close() !!}
            <p>Vistas: {{$cantidad}}</p>
        </div>

@endsection
@extends('layouts.admin')
@section('contenido')
    <div class="mensaje">

        <h2>Actualizar Logro:{{$logros->titulo}}</h2>
    </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($logros,['method'=>'PATCH','route'=>['portal.logros.update',$logros->idlogros]]) !!}
            {{Form::token()}}
            <div class="form-group">

                <label for="titulo">Titulo</label>
                <input type="text" name="titulo" class="form-control" value="{{$logros->titulo}}" placeholder="titulo">

                <label for="descripcion">Descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{$logros->descripcion}}" placeholder="descripcion">

                 </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" href="">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
            <p>Vistas: {{$cantidad}}</p>
        </div>

@endsection
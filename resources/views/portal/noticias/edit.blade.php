@extends('layouts.admin')
@section('contenido')
    <div class="mensaje">

        <h2>Actualizar Noticia:{{$noticias->titulo}}</h2>
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
            {!! Form::model($noticias,['method'=>'PATCH','route'=>['portal.noticias.update',$noticias->idnoticia]]) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="titulo">titulo</label>
                <input type="text" name="titulo" class="form-control" value="{{$noticias->titulo}}" placeholder="titulo">



                <label for="descripcion">descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{$noticias->descripcion}}" placeholder="descripcion">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" href="">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
        <p>Vistas: {{$cantidad}}</p>

@endsection
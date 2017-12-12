@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Actualizar Materia:{{$materias->sigla}}</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($materias,['method'=>'PATCH','route'=>['planestudio.materias.update',$materias->idmateria]]) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre" class="form-control" value="{{$materias->nombre}}" placeholder="nombre">

                <label for="sigla">sigla</label>
                <input type="text" name="sigla" class="form-control" value="{{$materias->sigla}}" placeholder="sigla">

                <label for="contenido">Contenido</label>
                <input type="text" name="contenido" class="form-control" value="{{$materias->contenido}}" placeholder="contenido">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" href="">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
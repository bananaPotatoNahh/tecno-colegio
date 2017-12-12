@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Actualizar Norma:{{$normas->codigo}}</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($normas,['method'=>'PATCH','route'=>['portal.normas.update',$normas->idnorma]]) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="codigo">codigo</label>
                <input type="text" name="codigo" class="form-control" value="{{$normas->codigo}}" placeholder="codigo">

                <label for="descripcion">descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{$normas->descripcion}}" placeholder="descripcion">



            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" href="">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
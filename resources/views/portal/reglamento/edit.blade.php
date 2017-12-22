@extends('layouts.admin')
@section('contenido')
    <div class="mensaje">

        <h2>Actualizar Reglamento:{{$reglamentos->codigo}}</h2>
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
            {!! Form::model($reglamentos,['method'=>'PATCH','route'=>['portal.reglamento.update',$reglamentos->idreglamento]]) !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="codigo">codigo</label>
                <input type="text" name="codigo" class="form-control" value="{{$reglamentos->codigo}}" placeholder="codigo">

                <label for="descripcion">descripcion</label>
                <input type="text" name="descripcion" class="form-control" value="{{$reglamentos->descripcion}}" placeholder="descripcion">



            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" href="">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
            <p>Vistas: {{$cantidad}}</p>
        </div>
    </div>
@endsection
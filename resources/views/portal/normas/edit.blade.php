@extends('layouts.admin')
@section('contenido')
    <div class="mensaje">

        <h2>Actualizar Norma:{{$normas->codigo}}</h2>
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
            <p>Vistas: {{$cantidad}}</p>
        </div>

@endsection
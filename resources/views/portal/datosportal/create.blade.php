@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
        <h3>Nuevo Portal</h3>
             @if(count($errors)>0)
                    <div class="alert alert-danger">
                 <ul>
                   @foreach($errors->all() as $error)
                       <li>{{$error}}</li>
                    @endforeach
                 </ul>
              </div>
                @endif
            {!! Form::open(array('url'=>'portal/datosportal','method'=>'POST','autocomplete'=>'off')) !!}
                {{Form::token()}}
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" class="form-control" placeholder="nombre">

                    <label for="mision">mision</label>
                    <input type="text" name="mision" class="form-control" placeholder="mision">

                    <label for="vision">vision</label>
                    <input type="text" name="vision" class="form-control" placeholder="vision">

                    <label for="objetivoGeneral">objetivo</label>
                    <input type="text" name="objetivoGeneral" class="form-control" placeholder="objetivoGeneral">

                    <label for="descripcion">descripcion</label>
                    <input type="text" name="descripcion" class="form-control" placeholder="descripcion">


                    <label for="logo">logo</label>
                    <input type="text" name="logo" class="form-control" placeholder="logo">
                </div>
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" href="">Guardar</button>
                    <button class="btn btn-danger" type="reset">Cancelar</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
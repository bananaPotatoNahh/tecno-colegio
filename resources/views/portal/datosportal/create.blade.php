@extends('layouts.admin')
@section('contenido')
    <div class="mensaje">

        <h3>Nuevo Portal</h3>
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
            <p>Vistas: {{$cantidad}}</p>
        </div>

@endsection
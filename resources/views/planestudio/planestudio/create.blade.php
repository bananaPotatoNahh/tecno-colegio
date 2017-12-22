@extends('layouts.admin')
@section('contenido')

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
            <h3>Nuevo Curriculum</h3>
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif




            {!! Form::open(array('url'=>'persona/curriculum','method'=>'POST','autocomplete'=>'off','files' => 'true'))  !!}
            {{Form::token()}}
            <div class="form-group">
                <label for="codigo">codigo</label>
                <input type="text" name="codigo" class="form-control" placeholder="codigo">
                <label for="curriculum">curriculum</label>
                <input type="file" name="curriculum" class="form-control" placeholder="curriculum">

            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit" href="">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
        </div>

        <p>Vistas: {{$cantidad}}</p>
    </div>
@endsection

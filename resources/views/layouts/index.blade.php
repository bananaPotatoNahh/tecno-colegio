@extends('layouts.admin')
@section('contenido')
<div class="row">
    <table class="table table-striped table-bordered table-condensed table-hover">
        @if(count($normas)>0)
            <div class="mensaje">
                <ul>
                    <label>Normas Encontradas</label>

                    <thead>
                    <th>codigo</th>
                    <th>descripcion</th>
                    </thead>
                    @foreach($normas as $nor)
                        <tr>

                            <td>{{$nor->codigo}}</td>
                            <td>{{$nor->descripcion}}</td>
                        </tr>

                    @endforeach
                </ul>
            </div>
        @endif
    </table>




    <table class="table table-striped table-bordered table-condensed table-hover">
        @if(count($datosportal)>0)
            <div class="mensaje">
                <ul>
                    <label>Datos Portal</label>

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th>nombre</th>
                        <th>mision</th>
                        <th>vision</th>
                        <th>objetivo general</th>
                        <th>descripcion</th>

                        </thead>
                        @foreach($datosportal as $dat)
                            <tr>
                                <td>{{$dat->nombre}}</td>
                                <td>{{$dat->mision}} </td>
                                <td>{{$dat->vision}}</td>
                                <td>{{$dat->objetivoGeneral}} </td>
                                <td>{{$dat->descripcion}}</td>

                            </tr>

                        @endforeach
                    </table>
                </ul>
            </div>
        @endif
    </table>



<div class="row"></div>
    <table class="table table-striped table-bordered table-condensed table-hover">
        @if(count($datosportal)>0)
            <div class="mensaje">
                <ul>
                    <label>Administrativos Encontrados</label>

                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead>
                        <th>nombre</th>
                        <th>apellido</th>
                        <th>direccion</th>
                        <th>numero documento</th>
                        <th>correo electronico</th>
                        <th>codigo</th>
                        <th>Ir</th>

                        </thead>
                        @foreach($administrativos as $dat)
                            <tr>


                                <td>{{$dat->nombre}}</td>
                                <td>{{$dat->apellido}} </td>
                                <td>{{$dat->direccion}}</td>
                                <td>{{$dat->numerodocumento}} </td>
                                <td>{{$dat->correoelectronico}}</td>
                                <td>{{$dat->codigo}} </td>
                                <td><a href="{{URL::action('AdministrativoController@show',$dat->idpersona)}}">
                                        <button class="btn btn-info">Mostrar</button>
                                    </a></td>
                            </tr>
                        @endforeach
                    </table>
                </ul>
            </div>
        @endif
    </table>
    <div class="wrapp">
    <table class="table table-striped table-bordered table-condensed table-hover">
        @if(count($normas)>0)
            <div class="mensaje">
                <ul>
                    <label>Normas Encontradas</label>

                    <thead>
                    <th>codigo</th>
                    <th>descripcion</th>
                    </thead>
                    @foreach($normas as $nor)
                        <tr>

                            <td>{{$nor->codigo}}</td>
                            <td>{{$nor->descripcion}}</td>
                        </tr>

                    @endforeach
                </ul>
            </div>
        @endif
    </table>
    </div>
</div>
@endsection
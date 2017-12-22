@extends('layouts.admin')
@section('contenido')
    <div class="white-box">
        <div class="center-block">
            <div class="panel panel-info">
                <div class="panel-heading text-center"> Datos del Portal
                    <div class="pull-right">
                        <a href="#" data-perform="panel-collapse"><i class="ti-minus"></i></a>
                        <a href="#" data-perform="panel-dismiss"><i class="ti-close"></i></a>
                    </div>
                </div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <ul class="list-icons">
                            <li>
                                <i class="fa fa-chevron-right text-danger"></i> <b class="h3 text-gray-dark">Nombre: </b> <span class="text-muted h3">{{ $datosportal->nombre }}</span>
                            </li>
                            <p></p>
                            <li>
                                <i class="fa fa-chevron-right text-danger"></i> <b class="h3 text-gray-dark"> Mision: </b> <span class="text-muted h3">{{ $datosportal->mision }}</span>
                            </li>
                            <p></p>
                            <li>
                                <i class="fa fa-chevron-right text-danger"></i> <b class="h3 text-gray-dark">Vision  : </b> <span class="text-muted h3">{{ $datosportal->vision }}</span>
                            </li>
                            <p></p>
                            <li>
                                <i class="fa fa-chevron-right text-danger"></i> <b class="h3 text-gray-dark">Objetivo  : </b> <span class="text-muted h3">{{ $datosportal->ojetivoGeneral }}</span>
                            </li>
                            <p></p>
                            <li>
                                <i class="fa fa-chevron-right text-danger"></i> <b class="h3 text-gray-dark">Descripcion  : </b> <span class="text-muted h3">{{ $datosportal->descripcion }}</span>
                            </li>
                            <p></p>

                        </ul>
                    </div>
                </div>
            </div>
            <p></p>
            <p>Vistas: {{$cantidad}}</p>
            <button onclick="window.location.href='{{ route('portaldatos.portaldatos.index') }}'" type="button" class="btn btn-success btn-rounded center-block">
                <i class="zmdi zmdi-arrow-left zmdi-hc-lg mr-1"></i> <b>Indice</b>
            </button>
        </div>
    </div>
@endsection


@extends('layouts.admin')
@section('contenido')
    <div class="row">
        <div class="mensaje">
          <h3>Reportes del sistema   </h3>
        </div>
        <p></p>
            <label>   Listado de administrativos   :<a href="{{url('reportesadministrativos')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
<p></p>
            <label>   Listado de curriculums   :<a href="{{url('reportescurriculum')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
<p></p>
            <label>   Listado de docentes   :<a href="{{url('reportesdocente')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
<p></p>
        <label>   Listado de Plan de Estudio   :<a href="{{url('reportesplanestudio')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
<p></p>
            <label>   Listado de Alumnos   :<a href="{{url('reportespersona')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
<p></p>
            <label>   Datos Portal  :<a href="{{url('reportesdatosportal')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
<p></p>
            <label>   Listado de Logros   :<a href="{{url('reporteslogros')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
<p></p>
            <label>   Listado de materias   :<a href="{{url('reportesmaterias')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
<p></p>
            <label>   Listado de normas   :<a href="{{url('reportesnormas')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
<p></p>
            <label>   Listado de noticias   :<a href="{{url('reportesnoticias')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>
            <p></p>
            <label>   Listado de reglamentos   :<a href="{{url('reportesreglamento')}}" target="_blank"><button class="btn btn-info">Reporte</button></a></label>

            </div>


    </div>
@endsection
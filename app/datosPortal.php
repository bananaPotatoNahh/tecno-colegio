<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class datosPortal extends Model
{
    protected  $table='datosportal';
    protected  $primaryKey='idportal';
    public $timestamps=false;
    protected  $fillable=[
        'nombre',
        'mision',
        'vision',
        'objetivoGeneral',
        'descripcion' ,
        'logo'
    ];
}

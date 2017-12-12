<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class administrativo extends Model
{

    protected  $table='administrativo';
    protected  $primaryKey='idadministrativo';
    public $timestamps=false;
    protected  $fillable=[
        'nombre',
        'apellido',
        'direccion',
        'numerodocumento',
        'correoelectronico',
        'codigo',
        'idportal',
        'idcargo'
    ];
}

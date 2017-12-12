<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class persona extends Model
{
    protected  $table='persona';
    protected  $primaryKey='idpersona';
    public $timestamps=false;
    protected  $fillable=[
        'nombre',
        'apellido',
        'direccion',
        'numerodocumento',
        'correoelectronico',
        'codigo',
        'tipo',
        'idportalcolegio',
    ];
}

<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class planestudio extends Model
{
    protected  $table='planestudio';
    protected  $primaryKey='idplanestudio';
    public $timestamps=true;
    protected  $fillable=[
        'nombre',
        'sigla',
        'descripcion',
        'idportalcolegio',

    ];
}

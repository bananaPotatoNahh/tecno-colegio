<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class detalleplanestudio extends Model
{
    protected  $table='detalleplanestudio';

    public $timestamps=true;
    protected  $fillable=[
        'prerequisito',
        'semestre',
        'idmateria',
        'idplanestudio'
    ];
}

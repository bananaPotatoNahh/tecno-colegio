<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class reglamentos extends Model
{
    protected  $table='reglamentos';
    protected  $primaryKey='idreglamento';
    public $timestamps=false;
    protected  $fillable=[
        'codigo',
        'descripcion',
        'idportal'
    ];
}

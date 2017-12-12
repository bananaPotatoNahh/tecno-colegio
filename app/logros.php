<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class logros extends Model
{
    protected  $table='logros';
    protected  $primaryKey='idlogros';
    public $timestamps=false;
    protected  $fillable=[
        'titulo',
        'descripcion',
        'idportal'
    ];
}

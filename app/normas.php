<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class normas extends Model
{
    protected  $table='normas';
    protected  $primaryKey='idnorma';
    public $timestamps=false;
    protected  $fillable=[
        'codigo',
        'descripcion',
        'idportalcolegio'
    ];
}

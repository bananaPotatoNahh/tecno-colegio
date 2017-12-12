<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class cargo extends Model
{
    protected  $table='cargo';
    protected  $primaryKey='idcargo';
    public $timestamps=false;
    protected  $fillable=[
        'nombre',
        'estado'
    ];
}

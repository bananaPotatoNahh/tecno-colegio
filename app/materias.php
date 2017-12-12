<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class materias extends Model
{
    protected  $table='materias';
    protected  $primaryKey='idmateria';
    public $timestamps=false;
    protected  $fillable=[
        'nombre',
        'sigla',
        'contenido',

    ];
}

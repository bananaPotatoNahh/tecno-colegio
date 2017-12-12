<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class docenteMateria extends Model
{
    protected  $table='docentemateria';
    public $timestamps=true;
    protected  $fillable=[
        'descripcion',
        'iddocente',
        'idmateria'
    ];
}

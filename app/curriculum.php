<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class curriculum extends Model
{
    protected  $table='curriculum';
    protected  $primaryKey='idcurriculum';
    public $timestamps=true;
    protected  $fillable=[
        'codigo',
        'curriculum',
        'idpersona',

    ];
}

<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class noticias extends Model
{
    protected  $table='noticias';
    protected  $primaryKey='idnoticia';
    public $timestamps=false;
    protected  $fillable=[
        'titulo',
        'descripcion',

    ];
}

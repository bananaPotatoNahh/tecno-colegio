<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class Templete extends Model
{
    protected  $table='templete';
    protected  $primaryKey='id';
    public $timestamps=false;
    protected  $fillable=[
        'searchText'
    ];
}

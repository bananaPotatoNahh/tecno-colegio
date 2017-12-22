<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class curriculum extends Model
{
    protected  $table='curriculum';
    protected  $primaryKey='idcurriculum';
    public $timestamps=false;
    protected  $fillable=[
        'codigo',
        'curriculum',
        'idpersona',

    ];
    public function setPathAttribute($path)
    {   $name=$path->getClientOriginalName();
        \Storage::disk('local')->put($name,\File::get($path));
    }
}

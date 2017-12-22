<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class Accion extends Model
{
    protected $table = "accion";

    protected $fillable = ['nombre','accion'];

    public $timestamps = false;

    public function roles()
    {
        return $this->belongsToMany('colegio\Rol', 'rol_accion', 'accion_id', 'rol_id');
    }
}

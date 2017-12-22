<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = "rol";

    protected $fillable = ['nombre','descripcion'];

    public $timestamps = false;

    public function acciones()
    {
        return $this->belongsToMany('colegio\Accion', 'rol_accion', 'rol_id', 'accion_id');
    }

    public function usuarios(){
        return $this->hasMany('colegio\User','rol_id');
    }
}

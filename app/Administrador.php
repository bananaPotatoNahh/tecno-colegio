<?php

namespace colegio;

use Illuminate\Database\Eloquent\Model;

class Administrador extends Model
{
    protected $table = "administrador";

    protected $fillable = ['ci','nombres','apellidos','estado','usuario_id'];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo('colegio\User', 'usuario_id');
    }
}

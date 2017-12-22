<?php

namespace colegio;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'users';

    protected $fillable = [
        'name', 'email', 'password', 'rol_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function rol()
    {
        return $this->belongsTo('colegio\Rol', 'rol_id');
    }

    public function administrador()
    {
        return $this->hasOne('colegio\Administrador', 'usuario_id');
    }

    public function administrativo()
    {
        return $this->hasOne('colegio\administrativo', 'usuario_id');
    }
}

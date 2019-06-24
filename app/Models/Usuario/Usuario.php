<?php

namespace App\Models\Usuario;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class Usuario extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $guarded = [];

    protected $hidden = ['password'];

    public function rol()
    {
        return $this->belongsTo(Roles::class);
    }

    public function cliente()
    {
        return $this->hasOne(Cliente::class);
    }

    public function clienteE()
    {
        return $this->hasOne(Cliente::class, 'analista_id');
    }

    public function actividad()
    {
        return $this->hasMany(ActividadAplicada::class);
    }

    /**
     * -------------------------------------------
     * For token
     * -------------------------------------------
     */
     public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}

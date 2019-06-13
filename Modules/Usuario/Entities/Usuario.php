<?php

namespace Modules\Usuario\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Modules\Shared\Entities\ActividadAplicada;
use Modules\Shared\Entities\CentroCosto;

class Usuario extends Model
{
    protected $guarded = [];

    protected $hidden = ['contrasena'];

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
}

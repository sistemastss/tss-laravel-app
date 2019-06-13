<?php

namespace Modules\Shared\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Esp\Entities\Esp;
use Modules\Usuario\Entities\Cliente;

class CentroCosto extends Model
{
    protected $guarded = [];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    function ordenCompra()
    {
        return $this->hasOne(OrdenCompra::class);
    }

    public function esp()
    {
        return $this->hasMany(Esp::class);
    }

    public function investigacion()
    {
        //return $this->hasMany(Investigacion::class)
    }

    public function poligrafia()
    {
        //
    }
}

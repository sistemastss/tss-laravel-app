<?php

namespace App\Models;

use App\Models\Esp\Esp;
use App\Models\Usuario\Cliente;
use Illuminate\Database\Eloquent\Model;


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

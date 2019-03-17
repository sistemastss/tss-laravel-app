<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ServicioDisponible extends Model
{
    //
    protected $table = 'servicios_disponibles';

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function actividadesDisponibles() {
        return $this->hasMany(ActividadDisponible::class, 'codigo');
    }
}

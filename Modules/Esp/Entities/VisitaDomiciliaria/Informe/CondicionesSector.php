<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CondicionesSector extends Model
{
    //

    protected $table = 'condiciones_sector';

    protected $fillable = [
        'entorno_habitacional_id',
        'ciudad',
        'barrio',
        'localidad',
        'vias_acceso',
        'transporte_publico',
        'centros_asistenciales',
        'flujo_vehicular',
        'nivel_segiuridad',
    ];

    public function entornoHabitacional() {
        return $this->belongsTo(EntornoHabitacional::class, 'entorno_habitacional_id');
    }
}

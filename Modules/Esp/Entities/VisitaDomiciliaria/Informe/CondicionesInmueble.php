<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CondicionesInmueble extends Model
{
    //
    protected $table = 'condiciones_inmueble';

    protected $fillable = [
        'entorno_habitacional_id',
        'estado_general',
        'acabados',
        'dotacion',
        'salubridad',
        'estrato',
        'servicios_publicos',
        'distribucion_vivienda',
    ];

    public function entornoHabitacional() {
        return $this->belongsTo(EntornoHabitacional::class, 'entorno_habitacional_id');
    }
}

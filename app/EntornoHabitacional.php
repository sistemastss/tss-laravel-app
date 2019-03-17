<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EntornoHabitacional extends Model
{
    protected $table = 'entorno_habitacional';

    protected $fillable = [
        'servicio_esp_id',
        'tipo_vivienda',
        'tenencia',
        'tiempo_permanencia',
        'propietario',
        'fotografia',
        'estado_general',
        'acabados',
        'dotacion',
        'salubridad',
        'estrato',
        'servicios_publicos',
        'distribucion_vivienda',
        'ciudad',
        'barrio',
        'localidad',
        'vias_acceso',
        'transporte_publico',
        'centros_asistenciales',
        'flujo_vehicular',
        'nivel_seguridad',
        'estado'
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }
}

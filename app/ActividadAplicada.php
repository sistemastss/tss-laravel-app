<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadAplicada extends Model
{
    protected $table = 'actividades_aplicadas';

    protected $fillable = [
        'actividad_codigo',
        'servicio_esp_id',
        'estado',
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }

    public function actividadDisponible() {
        return $this->belongsTo(ActividadDisponible::class, 'actividad_codigo', 'codigo');
    }

    public function actividadAsignada() {
        return $this->hasOne(ActividadAsignada::class, 'actividad_apl_id');
    }
}

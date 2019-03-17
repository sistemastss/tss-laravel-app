<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PersonaEvaluada extends Model
{
    //
    protected $table = 'personas_evaluadas';

    protected $fillable = [
        'servicio_esp_id',
        'nombre',
        'numero_identificacion',
        'departamento',
        'ciudad',
        'telefono',
        'email',
        'observaciones',
        'anexo'
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }

    public function actividadAsignada() {
        return $this->hasMany(ActividadAsignada::class, 'persona_evaluada_id');
    }
}

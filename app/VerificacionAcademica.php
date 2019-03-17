<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificacionAcademica extends Model
{
    //
    protected $table = 'verificacion_academica';

    protected $fillable = [
        'servicio_esp_id',
        'nivel',
        'institucion',
        'titulo',
        'anno',
        'ciudad',
        'confirmacion',
        'observacion',
    ];


    protected $casts = [
        'confirmacion' => 'boolean'
    ];


    public function personaEvaluada() {
        return $this->belongsTo(PersonaEvaluada::class, 'persona_evaluada_id');
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificacionLaboral extends Model
{
    //
    protected $table = 'verificacion_laboral';

    protected $fillable = [
        'servicio_esp_id',
        'empresa',
        'cargo',
        'telefono',
        'periodo',
        'jefe_inmediato',
        'cargo_jefe',
        'ciudad',
        'motivo_retiro',
        'confirmacion',
        'observaciones',
    ];

    protected $casts = [
        'confirmacion' => 'boolean'
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }
}

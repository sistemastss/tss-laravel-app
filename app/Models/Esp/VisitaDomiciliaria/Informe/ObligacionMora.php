<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObligacionMora extends Model
{
    //
    protected $table = 'obligaciones_mora';

    protected $fillable = [
        'servicio_esp_id',
        'entidad',
        'tipo_credito',
        'tiempo_mora',
        'monto_mora',
    ];

    public function servicioEsp()
    {
        return $this->belongsTo(PersonaEvaluada::class, 'servicio_esp_id');
    }
}

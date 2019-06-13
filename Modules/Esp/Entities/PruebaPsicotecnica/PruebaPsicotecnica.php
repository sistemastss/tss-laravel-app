<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PruebaPsicotecnica extends Model
{
    //
    protected $table = 'prueba_psicotecnica';

    protected $fillable = [
        'servicio_esp_id',
        'adjunto',
        'conclusion',
    ];

    public function servicioEsp()
    {
        return $this->belongsTo(PersonaEvaluada::class, 'servicio_esp_id');
    }
}

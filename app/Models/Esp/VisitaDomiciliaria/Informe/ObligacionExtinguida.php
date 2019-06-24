<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObligacionExtinguida extends Model
{
    //
    protected $table = 'obligaciones_extinguidas';

    protected $fillable = [
        'servicio_esp_id',
        'entidad',
        'fecha_apertura',
        'fecha_cierre',
        'tipo_credito',
        'valor',
    ];

    public function servicioEsp()
    {
        return $this->belongsTo(PersonaEvaluada::class, 'servicio_esp_id');
    }
}

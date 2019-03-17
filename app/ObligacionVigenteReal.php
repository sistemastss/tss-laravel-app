<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObligacionVigenteReal extends Model
{
    //

    protected $table = 'obligaciones_vigentes_real';

    protected $fillable = [
        'servicio_esp_id',
        'entidad',
        'linea_credito',
        'fecha_apertura',
        'valor_cargo_fijo',
    ];

    public function servicioEsp()
    {
        return $this->belongsTo(PersonaEvaluada::class, 'servicio_esp_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ObligacionVigente extends Model
{
    //

    protected $table = 'obligaciones_vigentes';

    protected $fillable = [
        'servicio_esp_id',
        'entidad',
        'tipo_credito',
        'valor_aprobado',
        'saldo_actual',
        'valor_cuota',
    ];

    public function servicioEsp()
    {
        return $this->belongsTo(PersonaEvaluada::class, 'servicio_esp_id');
    }
}

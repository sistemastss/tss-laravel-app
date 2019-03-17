<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CuentaBancaria extends Model
{
    //
    protected $table = 'cuentas_bancarias';

    protected $fillable = [
        'servicio_esp_id',
        'tipo_cuenta',
        'entidad',
        'ciudad',
        'fecha_apertura',
        'estado',
    ];

    public function servicioEsp()
    {
        return $this->belongsTo(PersonaEvaluada::class, 'servicio_esp_id');
    }

}

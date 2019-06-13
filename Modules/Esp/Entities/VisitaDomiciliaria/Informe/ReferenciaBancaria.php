<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferenciaBancaria extends Model
{
    //
    protected $table = 'referencias_bancarias';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'servicio_esp_id',
        'entidad',
        'tipo_cuenta',
    ];

    protected function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }
}

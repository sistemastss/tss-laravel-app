<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BienesMuebles extends Model
{
    //

    protected $table = 'bienes_muebles';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'servicio_esp_id',
        'clase',
        'modelo',
        'placa',
        'avaluo',
        'pignorado',
    ];

    protected $casts = [
        'pignorado' => 'boolean'
    ];

    protected function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BienesInmuebles extends Model
{
    //
    protected $table = 'bienes_inmuebles';

    protected $hidden = ['created_at', 'updated_at'];

    protected $fillable = [
        'servicio_esp_id',
        'tipo',
        'direccion',
        'telefono',
        'ciudad',
        'avaluo',
        'hipoteca',
    ];

    protected $casts = [
        'hipoteca' => 'boolean'
    ];


    public function servicioEsp()
    {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }
}

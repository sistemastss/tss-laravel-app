<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hijo extends Model
{
    protected $table = 'hijos';

    protected $fillable = [
        'servicio_esp_id',
        'nombre',
        'edad',
        'ocupacion',
        'ubicacion',
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }


    public function nucleoFamiliar() {
        return $this->belongsTo(NucleoFamiliar::class, 'nucleo_familiar_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NucleoFamiliar extends Model
{
    //

    protected $table = 'nucleo_familiar';

    protected $fillable = [
        'servicio_esp_id',
        'nombre',
        'edad',
        'numero_identificacion',
        'lugar_expedicion',
        'lugar_nacimiento',
        'fecha_nacimiento',
        'ocupacion',
        'empresa',
        'telefono',
        'tiempo_laborado',
        'fotografia',
        'observaciones'
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }

    public function hijos() {
        return $this->hasMany(Hijo::class, 'nucleo_familiar_id');
    }

    public function informacionFamiliar() {
        return $this->hasMany(InformacionFamiliar::class, 'nucleo_familiar_id');
    }

    public function referencias() {
        return $this->hasMany(Referencia::class, 'nucleo_familiar_id');
    }
}

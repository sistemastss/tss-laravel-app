<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModusVivendi extends Model
{
    //
    protected $table = 'modus_vivendi';

    protected $fillable = [
        'servicio_esp_id',
        'salario',
        'otros_ingresos',
        'salario_conyuge',
        'egresos_mensuales',
        'descripcion_gastos',
        'personas_dependientes',
        'analisis_patrimonial',
    ];


    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }


    public function bienesInmuebles() {
        return $this->hasMany(BienesInmuebles::class, 'modus_vivendi_id');
    }


    public function bienesMuebles() {
        return $this->hasMany(BienesMuebles::class, 'modus_vivendi_id');
    }


    public function referenciasBancarias() {
        return $this->hasMany(ReferenciaBancaria::class, 'modus_vivendi_id');
    }


    public function capacidadEndeudamiento() {
        return $this->hasMany(CapacidadEndeudamiento::class, 'modus_vivendi_id');
    }
}

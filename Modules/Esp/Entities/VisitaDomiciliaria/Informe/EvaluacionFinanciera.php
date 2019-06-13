<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EvaluacionFinanciera extends Model
{
    //
    protected $table = 'evaluacion_financiera';

    protected $fillable = [
        'servicio_esp_id',
        'conclusion',
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }

    public function cuentasBancarias() {
        return $this->hasMany(CuentaBancaria::class, 'evaluacion_financiera_id');
    }

    public function obligacionesVigentes() {
        return $this->hasMany(ObligacionVigente::class, 'evaluacion_financiera_id');
    }

    public function obligacionesVigentesReal() {
        return $this->hasMany(ObligacionVigenteReal::class, 'evaluacion_financiera_id');
    }

    public function obligacionesMora() {
        return $this->hasMany(ObligacionMora::class, 'evaluacion_financiera_id');
    }

    public function obligacionesExtinguidas() {
        return $this->hasMany(ObligacionExtinguida::class, 'evaluacion_financiera_id');
    }


}

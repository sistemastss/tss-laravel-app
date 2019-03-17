<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consolidado extends Model
{
    //
    protected $table = 'consolidado';

    protected $fillable = [
        'servicio_esp_id',
        'antecedentes',
        'antecedentes_obs',
        'poligrafia',
        'poligrafia_obs',
        'financiero',
        'financiero_obs',
        'licencia_conduccion',
        'cat',
        'vigencia',
        'comparendos',
        'historial',
        'firma',
        'conclucion',
        'observacion',
    ];

    protected $casts = [
        'antecedentes'          => 'boolean',
        'poligrafia'            => 'boolean',
        'financiero'            => 'boolean',
        'licencia_conduccion'   => 'boolean',
        'comparendos'           => 'boolean',
        'conclucion'            => 'boolean',
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }

    public function datosInforme() {
        return $this->hasOne(DatosInforme::class, 'consolidado_id');
    }
}

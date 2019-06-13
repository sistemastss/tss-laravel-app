<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DatosInforme extends Model
{
    //
    protected $table = 'datos_informe';

    protected $fillable = [
        'consolidado_id',
        'encabezado',
        'foto_evaluado',
        'logo_cliente',
        'nucleo_familiar',
        'verficacion_va',
        'verficacion_vl',
        'referencias_bancarias',
        'capacidad_endeudamiento',
        'estudio_financiero',
        'historial_judicial',
        'evaluacion_seguridad',
    ];


    protected $casts = [
        'consolidado_id'            => 'boolean',
        'encabezado'                => 'boolean',
        'foto_evaluado'             => 'boolean',
        'logo_cliente'              => 'boolean',
        'nucleo_familiar'           => 'boolean',
        'verficacion_va'            => 'boolean',
        'verficacion_vl'            => 'boolean',
        'referencias_bancarias'     => 'boolean',
        'capacidad_endeudamiento'   => 'boolean',
        'estudio_financiero'        => 'boolean',
        'historial_judicial'        => 'boolean',
        'evaluacion_seguridad'      => 'boolean',
    ];

    public function consolidado() {
        return $this->belongsTo(Consolidado::class, 'consolidado_id');
    }
}

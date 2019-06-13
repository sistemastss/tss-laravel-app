<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistorialJudicial extends Model
{
    //
    /**
     * @var string
     */
    protected $table = 'historial_judicial';


    /**
     * @var array
     */
    protected $fillable = [
        'servicio_esp_id',
        'proceso_juridico',
        'proceso_procuraduria',
        'proceso_contraloria',
        'proceso_fiscalia',
        'proceso_policia',
        'proceso_transito',
        'verificacion',
        'orden_captura_internacional',
        'sanciones_penales',
        'delito_procuraduria',
        'inhabilidades_procuraduria',
        'fecha_inhabilidad',
        'antecedentes_fiscales',
        'fecha_antecedente',
        'clase_proceso',
        'datos_sentencia',
        'delito_judicial',
        'situacion_juridica',
        'f_g_n_ns',
        'lista_ofac',
        'lista_onu',
        'vinculos_subversion',
        'antecedentes_policia',
        'paramilitarismo',
        'movilidad',
        'total_adeudado',
        'observaciones',
    ];


    /**
     * @var array
     */
    protected $casts = [
        'proceso_juridico'              => 'boolean',
        'proceso_procuraduria'          => 'boolean',
        'proceso_contraloria'           => 'boolean',
        'proceso_fiscalia'              => 'boolean',
        'proceso_policia'               => 'boolean',
        'proceso_transito'              => 'boolean',
        'verificacion'                  => 'boolean',
        'orden_captura_internacional'   => 'boolean',
        'antecedentes_fiscales'         => 'boolean',
        'lista_ofac'                    => 'boolean',
        'lista_onu'                     => 'boolean',
        'vinculos_subversion'           => 'boolean',
        'antecedentes_policia'          => 'boolean',
        'paramilitarismo'               => 'boolean',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }

}

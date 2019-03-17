<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EstadoSalubridad extends Model
{
    //
    /**
     * @var string
     */
    protected $table = 'estado_salubridad';


    /**
     * @var array
     */
    protected $fillable = [
        'servicio_esp_id',
        'toma_medicamentos',
        'sufre_enfermedades',
        'tratamiento_psicologico',
        'fuma',
        'consume_alcohol',
        'consume_drogas',
        'realiza_deporte',
        'hobbies',
    ];


    protected $casts = [
        'fuma'              => 'boolean',
        'consume_alcohol'   => 'boolean',
        'consume_drogas'    => 'boolean',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }
}

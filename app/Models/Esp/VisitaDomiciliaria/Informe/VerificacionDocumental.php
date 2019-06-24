<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VerificacionDocumental extends Model
{
    //
    protected $table = 'verificacion_documental';

    protected $fillable = [
        'servicio_esp_id',
        'cedula_ciudadania',
        'libreta_militar',
        'licencia_conduccion',
        'tarjeta_profesional',
        'diploma_bachiller',
        'diploma_tecnico',
        'diploma_tecnologo',
        'diploma_pregrado',
        'diploma_postgrado',
        'diploma_cursos',
        'observaciones',
        'estado'
    ];

    protected $casts = [
        'cedula_ciudadania'     => 'boolean',
        'libreta_militar'       => 'boolean',
        'licencia_conduccion'   => 'boolean',
        'tarjeta_profesional'   => 'boolean',
        'diploma_bachiller'     => 'boolean',
        'diploma_tecnico'       => 'boolean',
        'diploma_tecnologo'     => 'boolean',
        'diploma_pregrado'      => 'boolean',
        'diploma_postgrado'     => 'boolean',
        'diploma_cursos'        => 'boolean',
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }


}

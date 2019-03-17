<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadDisponible extends Model
{
    //
    protected $table = 'actividades_disponibles';

    protected $fillable = [
        'codigo',
        'nombre',
        'tiempos',
        'servicio_disp_codigo',
        'active',
    ];

    protected $hidden = [
        'created_at',
        'updated_at'
    ];

    public function actividadAplicada()
    {
        return $this->hasMany(ActividadAplicada::class, 'actividad_codigo', 'codigo');
    }

    public function servicioDisponible()
    {
        return $this->belongsTo(ServicioDisponible::class, 'servicio_disp_codigo', 'codigo');
    }
}

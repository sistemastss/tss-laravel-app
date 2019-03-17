<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActividadAsignada extends Model
{
    //
    protected $table = 'actividades_asignadas';

    protected $fillable = [
        'usuario_id',
        'actividad_apl_id',
        'estado',
    ];

    public function funcionario() {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function actividadAplicada() {
        return $this->belongsTo(ActividadAplicada::class,'actividad_apl_id');
    }

}

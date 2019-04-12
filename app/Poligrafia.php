<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poligrafia extends Model
{
    protected $table = 'poligrafia';

    protected $fillable = [
        'centro_costo_id',
        'evaluado',
        'tipo_documento',
        'documento',
        'departamento',
        'ciudad',
        'telefono',
        'email',
        'contexto',
        'tipo_poligrafia',
        'anexo',
    ];

    public function centroCosto()
    {
        return $this->belongsTo(CentroCosto::class);
    }

    public function actividades()
    {
        return $this->morphMany(ActividadAplicada::class, 'actividad');
    }
}

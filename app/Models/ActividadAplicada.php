<?php

namespace App\Models;

use App\Models\Usuario\Usuario;
use App\Models\Esp\VisitaDomiciliaria;

use Illuminate\Database\Eloquent\Model;

class ActividadAplicada extends Model
{
    protected $table = 'actividades_aplicadas';

    protected $guarded = [];

    public function actividad()
    {
        return $this->belongsTo(Actividad::class);
    }

    public function actividades()
    {
        return $this->morphTo();
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function visitaDomiciliaria()
    {
        return $this->hasOne(VisitaDomiciliaria::class);
    }
}

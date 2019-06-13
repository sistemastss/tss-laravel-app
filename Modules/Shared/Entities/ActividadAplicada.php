<?php

namespace Modules\Shared\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Usuario\Entities\Usuario;

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
}

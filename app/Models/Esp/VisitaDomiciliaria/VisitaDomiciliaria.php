<?php

namespace App\Models\Esp\VisitaDomiciliaria;

use App\Models;
use App\Models\Esp\VisitaDomiciliaria\Informe\Informe;
use App\Models\Esp\VisitaDomiciliaria\Programacion\Programacion;
use App\Models\Esp\VisitaDomiciliaria\Seguimiento\Seguimiento;
use App\Models\Esp\VisitaDomiciliaria\Viatico\Viatico;
use Illuminate\Database\Eloquent\Model;

class VisitaDomiciliaria extends Model
{
    protected $table = 'visita_domiciliaria';

    protected $guarded = [];

    public $timestamps = false;


    public function actividadApl()
    {
        return $this->belongsTo(ActividadAplicada::class);
    }

    public function esp()
    {
        return $this->belongsTo(Esp::class);
    }

    public function programacion()
    {
        return $this->hasOne(Programacion::class);
    }

    public function seguimiento()
    {
        return $this->hasOne(Seguimiento::class);
    }

    public function viatico()
    {
        return $this->hasOne(Viatico::class);
    }

    public function informe()
    {
        return $this->hasOne(Informe::class);
    }
}

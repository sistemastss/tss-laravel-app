<?php

namespace Modules\Esp\Entities\VisitaDomiciliaria;

use App\Informe;
use Illuminate\Database\Eloquent\Model;
use Modules\Esp\Entities\Esp;
use Modules\Esp\Entities\VisitaDomiciliaria\Programacion\Programacion;
use Modules\Esp\Entities\VisitaDomiciliaria\Seguimiento\Seguimiento;
use Modules\Esp\Entities\VisitaDomiciliaria\Viatico\Viatico;

class VisitaDomiciliaria extends Model
{
    protected $table = 'visita_domiciliaria';

    protected $guarded = [];

    public $timestamps = false;

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

<?php

namespace Modules\Esp\Entities\VisitaDomiciliaria\Programacion;

use Illuminate\Database\Eloquent\Model;
use Modules\Esp\Entities\VisitaDomiciliaria\VisitaDomiciliaria;

class Programacion extends Model
{
    protected $table = 'programacion';

    protected $guarded = [];

    public function visitaDomiciliaria()
    {
        return $this->belongsTo(VisitaDomiciliaria::class);
    }
}

<?php

namespace Modules\Esp\Entities\VisitaDomiciliaria\Seguimiento;

use Illuminate\Database\Eloquent\Model;
use Modules\Esp\Entities\VisitaDomiciliaria\VisitaDomiciliaria;

class Seguimiento extends Model
{
    //
    protected $table = 'seguimientos';

    protected $guarded = [];

    public function visitaDomiciliaria()
    {
        return $this->belongsTo(VisitaDomiciliaria::class);
    }


}

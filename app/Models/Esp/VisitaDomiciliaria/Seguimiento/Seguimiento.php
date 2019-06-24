<?php

namespace App\Models\Esp\VisitaDomiciliaria\Seguimiento;

use App\Models\Esp\VisitaDomiciliaria\VisitaDomiciliaria;
use Illuminate\Database\Eloquent\Model;

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

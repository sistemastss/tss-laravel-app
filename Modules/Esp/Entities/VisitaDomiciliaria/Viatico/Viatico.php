<?php

namespace Modules\Esp\Entities\VisitaDomiciliaria\Viatico;


use Illuminate\Database\Eloquent\Model;
use Modules\Esp\Entities\VisitaDomiciliaria\VisitaDomiciliaria;

class Viatico extends Model
{
    protected $table = 'viatico';

    protected $fillable = ['*'];

    public function visitaDomiciliaria()
    {
        return $this->belongsTo(VisitaDomiciliaria::class);
    }

}

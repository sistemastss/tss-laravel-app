<?php

namespace App\Models\Esp\VisitaDomiciliaria\Viatico;


use App\Models\Esp\VisitaDomiciliaria\VisitaDomiciliaria;
use Illuminate\Database\Eloquent\Model;

class Viatico extends Model
{
    protected $table = 'viatico';

    protected $fillable = ['*'];

    public function visitaDomiciliaria()
    {
        return $this->belongsTo(VisitaDomiciliaria::class);
    }

}

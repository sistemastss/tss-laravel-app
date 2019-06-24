<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table = 'servicios';

    protected $guarded = [];

    public $timestamps = false;

    public function actividades()
    {
        return $this->hasMany(Actividad::class);
    }
}

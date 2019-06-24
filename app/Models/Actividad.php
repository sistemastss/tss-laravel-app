<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    protected $table = 'actividades';

    protected $guarded = [];

    public $timestamps = false;

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }

    public function actividadAplicada()
    {
        return $this->hasMany(ActividadAplicada::class);
    }
}

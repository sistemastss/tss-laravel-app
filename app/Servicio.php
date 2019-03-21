<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'centro_costo_id',
        'ciudad',
        'anexo',
        'descripcion',
        'clase',
        'estado',
    ];

    public function centroCosto()
    {
        return $this->belongsTo(CentroCosto::class);
    }

    public function servicioEsp()
    {
        return $this->hasMany(ServicioEsp::class);
    }

    public function investigacion()
    {
        return $this->hasMany(Investigacion::class);
    }

}

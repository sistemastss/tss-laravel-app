<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $fillable = [
        'centro_costo_id',
        'ciudad_desarrollo',
        'anexo',
        'tipo_servicio',
    ];

    public function centroCosto()
    {
        return $this->belongsTo(CentroCosto::class);
    }



}

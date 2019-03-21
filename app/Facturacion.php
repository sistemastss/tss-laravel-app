<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Facturacion extends Model
{
    protected $fillable = [
        'centro_costo_id',
        'destinatario',
        'tipo_sociedad',
        'tipo_identificacion',
        'identificacion',
        'telefono',
        'email',
    ];

    public function centroCosto()
    {
        return $this->belongsTo(CentroCosto::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    //
    protected $table = 'orden_compra';

    protected $fillable = [
        'centro_costo_id',
        'numero_orden_compra',
        'anexo'
    ];

    public function centroCosto() {
        return $this->belongsTo(CentroCosto::class, 'centro_costo_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrdenCompra extends Model
{
    //
    protected $table = 'orden_compra';

    public $timestamps = false;

    protected $fillable = [
        'centro_costo_id',
        'numero_orden',
        'anexo'
    ];

    public function centroCosto() {
        return $this->belongsTo(CentroCosto::class);
    }
}

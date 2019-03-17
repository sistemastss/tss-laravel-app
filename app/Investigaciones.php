<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigaciones extends Model
{
    protected $table = 'investigaciones';

    protected $fillable = [
        'centro_costo_id',
        'ciudad',
        'descripcion',
        'anexo'
    ];

    public function centroCosto()
    {
        return $this->belongsTo(CentroCosto::class, 'centro_costo_id');
    }
}

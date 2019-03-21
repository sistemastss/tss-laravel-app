<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{
    protected $table = 'investigaciones';

    protected $fillable = [
        'servicio_id',
        'ciudad',
        'descripcion',
        'anexo'
    ];

    public function servicio()
    {
        return $this->belongsTo(Servicio::class);
    }
}

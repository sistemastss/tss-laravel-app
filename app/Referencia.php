<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    //
    protected $table = 'referencias';

    protected $fillable = [
        'servicio_esp_id',
        'nombre',
        'ocupacion',
        'telefono',
        'ciudad',
        'confirmacion'
    ];

    public function servicioEsp()
    {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }

}

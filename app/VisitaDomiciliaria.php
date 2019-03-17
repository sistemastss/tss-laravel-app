<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisitaDomiciliaria extends Model
{
    //
    protected $table = 'visita_domiciliaria';

    protected $fillable = [
        'servicio_esp_id'
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id');
    }


}

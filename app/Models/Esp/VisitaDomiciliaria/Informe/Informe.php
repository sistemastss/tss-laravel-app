<?php

namespace App\Models\Esp\VisitaDomiciliaria\Informe;

use App\Models\Esp\Esp;
use Illuminate\Database\Eloquent\Model;

class Informe extends Model
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
        return $this->belongsTo(Esp::class);
    }

}

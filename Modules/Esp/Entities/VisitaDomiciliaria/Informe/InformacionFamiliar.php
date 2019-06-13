<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InformacionFamiliar extends Model
{
    //

    protected $table = 'informacion_familiar';

    protected $fillable = [
        'servicio_esp_id',
        'nombre',
        'edad',
        'ocupacion',
        'telefono',
        'ciudad',
        'parentesco',
        'vive_con_ud',
    ];

    protected $casts = [
        'vive_con_ud' => 'boolean'
    ];

    public function servicioEsp() {
        return $this->belongsTo(ServicioEsp::class, 'servicio_esp_id', 'id');
    }
}

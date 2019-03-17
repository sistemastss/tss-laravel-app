<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DictamenGrafologico extends Model
{
    //
    protected $table = 'dictamen_grafologico';

    protected $fillable = [
        'servicio_esp_id',
        'adjunto',
        'conclusion',
    ];

    public function servicioEsp()
    {
        return $this->belongsTo(PersonaEvaluada::class, 'servicio_esp_id');
    }

}

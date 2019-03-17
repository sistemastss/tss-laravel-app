<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DecaDactilar extends Model
{
    //
    protected $table = 'decadactilar';

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

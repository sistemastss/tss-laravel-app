<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Poligrafia extends Model
{
    //

    protected $table = 'poligrafia';

    protected $fillable = [
        'persona_evaluada_id',
        'tipo_prueba',
        'cargo_aplica',
        'adjunto',
    ];

    public function personaEvaluada() {
        return $this->belongsTo(PersonaEvaluada::class, 'persona_evaluada_id');
    }
}

<?php

namespace App\Models\Investigacion;

use App\Models\CentroCosto;
use Illuminate\Database\Eloquent\Model;

class Investigacion extends Model
{
    protected $table = 'investigaciones';

    protected $fillable = [
        'centro_costo_id',
        'ciudad',
        'anexo',
        'descripcion',
    ];

    public function centroCosto()
    {
        return $this->belongsTo(CentroCosto::class);
    }
}

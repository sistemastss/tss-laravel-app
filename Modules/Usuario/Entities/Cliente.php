<?php

namespace Modules\Usuario\Entities;

use Illuminate\Database\Eloquent\Model;
use Modules\Shared\Entities\CentroCosto;

class Cliente extends Model
{
    protected $guarded = [];

    public $timestamps = false;

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function centroCosto()
    {
        return $this->hasMany(CentroCosto::class);
    }

    public function analista() {
        return $this->belongsTo(Usuario::class, 'analista_id');
    }
}

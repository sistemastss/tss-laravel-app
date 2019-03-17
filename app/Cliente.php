<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    public function rol()
    {
        return $this->belongsTo(Roles::class);
    }


    public function centroCostos()
    {
        return $this->hasMany(CentroCosto::class, 'cliente_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class Usuario extends Model
{
    //
    protected $table = 'usuarios';

    protected $hidden = ['contrasena'];

    public function roles() {
        return $this->belongsTo(Roles::class, 'rol_id', 'id');
    }

    public function centroCosto() {
        return $this->hasMany(CentroCosto::class, 'usuario_id');
    }
}

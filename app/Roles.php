<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    //
    protected $table = 'roles';

    protected $hidden = ['created_at', 'updated_at', 'active'];

    public function clientes() {
        return $this->hasMany(Cliente::class, 'rol_id');
    }

    public function usuarios() {
        return $this->hasMany(Usuario::class, 'rol_id');
    }
}

<?php

namespace App\Models\Usuario;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $guarded = [];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}

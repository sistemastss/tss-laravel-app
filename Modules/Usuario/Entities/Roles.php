<?php

namespace Modules\Usuario\Entities;

use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    protected $guarded = [];

    public function usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}

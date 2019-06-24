<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluado extends Model
{

    protected $guarded = [];

    public function evaluado()
    {
        return $this->morphTo();
    }

}

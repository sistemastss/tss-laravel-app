<?php

namespace Modules\Shared\Entities;

use Illuminate\Database\Eloquent\Model;

class Evaluado extends Model
{

    protected $guarded = [];

    public function evaluado()
    {
        return $this->morphTo();
    }

}

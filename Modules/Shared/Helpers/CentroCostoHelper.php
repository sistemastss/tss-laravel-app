<?php


namespace Modules\Shared\Helpers;


use Modules\Shared\Entities\CentroCosto;

class CentroCostoHelper
{
    public function create($centroCosto)
    {
        return CentroCosto::create($centroCosto);
    }

}
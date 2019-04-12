<?php

namespace Modules\Esp\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class EspResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}

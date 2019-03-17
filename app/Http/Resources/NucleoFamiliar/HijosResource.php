<?php

namespace App\Http\Resources\NucleoFamiliar;

use Illuminate\Http\Resources\Json\JsonResource;

class HijosResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'   => $this->id,
            'edad' => $this->edad,
            'nombre' => $this->nombre,
            'ocupacion' => $this->ocupacion,
            'ubicacion' => $this->ubicacion,
        ];
    }
}

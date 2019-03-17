<?php

namespace App\Http\Resources\NucleoFamiliar;

use Illuminate\Http\Resources\Json\JsonResource;

class ReferenciasResource extends JsonResource
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
            'nombre' => $this->nombre,
            'ocupacion' => $this->ocupacion,
            'telefono' => $this->telefono,
            'ciudad' => $this->ciudad,
            'confirmacion' => $this->confirmacion
        ];
    }
}

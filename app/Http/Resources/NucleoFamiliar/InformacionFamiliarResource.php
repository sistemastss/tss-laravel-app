<?php

namespace App\Http\Resources\NucleoFamiliar;

use Illuminate\Http\Resources\Json\JsonResource;

class InformacionFamiliarResource extends JsonResource
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
            'id'    => $this->id,
            'nombre' =>  $this->nombre,
            'edad' =>  $this->edad,
            'ocupacion' =>  $this->ocupacion,
            'telefono' =>  $this->telefono,
            'ciudad' => $this->ciudad,
            'parentesco' => $this->parentesco,
            'viveConUd' =>  $this->vive_con_ud,
        ];
    }
}

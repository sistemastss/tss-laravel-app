<?php

namespace App\Http\Resources\ModusVivendi;

use Illuminate\Http\Resources\Json\JsonResource;

class BienesInmueblesResource extends JsonResource
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
            'id'        => $this->id,
            'tipo'      => $this->tipo,
            'direccion' => $this->direccion,
            'telefono'  => $this->telefono,
            'ciudad'    => $this->ciudad,
            'avaluo'    => $this->avaluo,
            'hipoteca'  => $this->hipoteca
        ];
    }
}

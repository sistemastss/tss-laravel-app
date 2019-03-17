<?php

namespace App\Http\Resources\ModusVivendi;

use Illuminate\Http\Resources\Json\JsonResource;

class BienesMueblesResource extends JsonResource
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
            'id' => $this->id,
            'clase' => $this->clase,
            'modelo' => $this->modelo,
            'placa' => $this->placa,
            'avaluo' => $this->avaluo,
            'pignorado' => $this->pignorado
        ];
    }
}

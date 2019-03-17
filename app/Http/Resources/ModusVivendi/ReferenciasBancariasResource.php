<?php

namespace App\Http\Resources\ModusVivendi;

use Illuminate\Http\Resources\Json\JsonResource;

class ReferenciasBancariasResource extends JsonResource
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
            'entidad' => $this->entidad ,
            'tipoCuenta' => $this->tipo_cuenta
        ];
    }
}

<?php

namespace App\Http\Resources\ModusVivendi;

use Illuminate\Http\Resources\Json\JsonResource;

class CapacidadEndeudamientoResource extends JsonResource
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
            'descripcion' => $this->descripcion,
            'entidad' => $this->entidad,
            'monto' => $this->monto,
            'estadoDeuda' => $this->estado_deuda,
            'valorMensual' =>$this->valor_mensual,
        ];
    }
}

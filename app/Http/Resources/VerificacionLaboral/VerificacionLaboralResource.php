<?php

namespace App\Http\Resources\VerificacionLaboral;

use Illuminate\Http\Resources\Json\JsonResource;

class VerificacionLaboralResource extends JsonResource
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
            'empresa' => $this->empresa,
            'cargo' => $this->cargo,
            'telefono' => $this->telefono,
            'periodo' => $this->periodo,
            'jefeInmediato' => $this->jefe_inmediato,
            'cargoJefe' => $this->cargo_jefe,
            'ciudad' => $this->ciudad,
            'motivoRetiro' => $this->motivo_retiro,
            'confirmacion' => $this->confirmacion,
            'observaciones' => $this->observaciones,
        ];
    }
}

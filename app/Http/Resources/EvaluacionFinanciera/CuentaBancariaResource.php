<?php

namespace App\Http\Resources\EvaluacionFinanciera;

use Illuminate\Http\Resources\Json\JsonResource;

class CuentaBancariaResource extends JsonResource
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
            'id'            => $this->id,
            'tipoCuenta'    => $this->tipo_cuenta,
            'entidad'       => $this->entidad,
            'ciudad'        => $this->ciudad,
            'fechaApertura' => $this->fecha_apertura,
            'estado'        => $this->estado,
        ];
    }
}

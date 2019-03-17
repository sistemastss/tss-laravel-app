<?php

namespace App\Http\Resources\EvaluacionFinanciera;

use Illuminate\Http\Resources\Json\JsonResource;

class ObligacionVigenteRealResource extends JsonResource
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
            'id'                => $this->id,
            'entidad'           => $this->entidad,
            'lineaCredito'      => $this->linea_credito,
            'fechaApertura'     => $this->fecha_apertura,
            'valorCargoFijo'    => $this->valor_cargo_fijo,
        ];
    }
}

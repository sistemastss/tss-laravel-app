<?php

namespace App\Http\Resources\EvaluacionFinanciera;

use Illuminate\Http\Resources\Json\JsonResource;

class ObligacionExtinguidaResource extends JsonResource
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
            'entidad'       => $this->entidad,
            'fechaApertura' => $this->fecha_apertura,
            'fechaCierre'   => $this->fecha_cierre,
            'tipoCredito'   => $this->tipo_credito,
            'valor'         => $this->valor,
        ];
    }
}

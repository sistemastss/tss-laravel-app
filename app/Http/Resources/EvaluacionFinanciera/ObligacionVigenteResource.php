<?php

namespace App\Http\Resources\EvaluacionFinanciera;

use Illuminate\Http\Resources\Json\JsonResource;

class ObligacionVigenteResource extends JsonResource
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
            'tipoCredito'   => $this->tipo_credito,
            'valorAprobado' => $this->valor_aprobado,
            'saldoActual'   => $this->saldo_actual,
            'valorCuota'    => $this->valor_cuota,
        ];
    }
}

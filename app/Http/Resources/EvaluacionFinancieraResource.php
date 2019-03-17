<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EvaluacionFinancieraResource extends JsonResource
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
            'id' => $this->resource->id,
            /*'persona_evaluada_id' => $this->resource->persona_evaluada_id,
            'resumen_endeudado' => $this->resource->resumen_endeudado,
            'cuentas_bancarias' => $this->resource->cuentasBancarias,
            'obligaciones_vigentes' => $this->resource->obligacionesVigentes*/
            'conclusion' => $this->conclusion,
            'timestamps' => [
                'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i'),
            ],
        ];
    }
}

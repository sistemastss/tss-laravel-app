<?php

namespace Modules\Shared\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ActividadAplicadaResource extends JsonResource
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
            'id'                 => $this->id,
            'estado'             => $this->estado,
            'codigo'             => $this->actividad->codigo,
            'nombre'             => $this->actividad->nombre,
            'tiempos'            => $this->actividad->tiempos,
            'usuario'            => $this->when($this->usuario, $this->usuario),
            'fechaCreacion'      => $this->created_at->format('Y-m-d H:i'),
            'fechaActualizacion' => $this->updated_at->format('Y-m-d H:i')
        ];
    }
}

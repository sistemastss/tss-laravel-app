<?php

namespace Modules\Shared\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class ActividadResource extends JsonResource
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
            'id'          => $this->id,
            'servicio'    => $this->servicio,
            'codigo'      => $this->codigo,
            'nombre'      => $this->nombre,
            'tiempos'     => $this->tiempos,
            'active'      => $this->active,
        ];
    }
}

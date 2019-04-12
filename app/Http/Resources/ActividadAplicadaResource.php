<?php

namespace App\Http\Resources;

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
            'id'                => $this->id,
            'estado'            => $this->estado,
            'codigo'            => $this->actividad_codigo,
            'nombre'            => $this->actividadDisponible->nombre,
            'tiempos'           => $this->actividadDisponible->tiempos,
            'actividadAsignada' => $this->when($this->actividadAsignada, new ActividadAsignadaResource($this->actividadAsignada)),
            'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
            'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i')
        ];
    }
}

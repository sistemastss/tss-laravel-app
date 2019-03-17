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
            'id'                => $this->resource->id,
            'estado'            => $this->estado,
            'codigo'            => $this->actividadDisponible->codigo,
            'nombre'            => $this->actividadDisponible->nombre,
            'tiempos'           => $this->actividadDisponible->tiempos,
            'actividadAsignada' => $this->when($this->actividadAsignada, new ActividadAsignadaResource($this->actividadAsignada)),
            'timestamps' => [
                'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i')
            ],
            'links' => [
                'self'          => route('actividad-aplicada.show', $this->id),
                'servicioEsp'   => route('servicio-esp.show', $this->servicio_esp_id)
            ]
        ];
    }
}

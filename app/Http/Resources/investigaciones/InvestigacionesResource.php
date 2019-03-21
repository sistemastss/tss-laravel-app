<?php

namespace App\Http\Resources\investigaciones;

use App\Http\Resources\CentroCostoResource;
use Illuminate\Http\Resources\Json\JsonResource;

class InvestigacionesResource extends JsonResource
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
            'id'                => $this->servicio->id,
            'centroCosto'       => new CentroCostoResource($this->servicio->centroCosto),
            'clase'             => $this->servicio->clase,
            'anexo'             => $this->servicio->anexo,
            'estado'            => $this->servicio->estado,
            'timestamps' => [
                'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i')
            ],
            'links' => [
                // 'self'          => route('servicio-esp.show', $this->id),
                // 'actividades'   => route('servicio-esp.actividades.index', $this->id),
            ]
        ];
    }
}

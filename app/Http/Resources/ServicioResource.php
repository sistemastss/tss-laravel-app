<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicioResource extends JsonResource
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
            'centroCosto'   => new CentroCostoResource($this->centroCosto),
            'adjunto'       => $this->centroCosto->solicitante,
            'clase'         => $this->clase,
            'anexo'         => $this->anexo,
            // 'informe'    => $this->informe,
            'estado'        => $this->estado,
            'fechaCreacion' => $this->created_at->format('Y-m-d H:i'),
            'links' => [
                // 'self'          => route('servicio-esp.show', $this->id),
                // 'actividades'   => route('servicio-esp.actividades.index', $this->id),
            ]
        ];
    }
}

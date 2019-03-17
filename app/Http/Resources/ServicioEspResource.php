<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicioEspResource extends JsonResource
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
            'centroCosto'       => new CentroCostoResource($this->centroCosto),
            'ciudadDesarrollo'  => $this->ciudad_desarrollo,
            'nombre'            => $this->nombre,
            'documento'         => $this->documento,
            'departamento'      => $this->departamento,
            'ciudad'            => $this->ciudad,
            'telefono'          => $this->telefono,
            'email'             => $this->email,
            'observaciones'     => $this->observaciones,
            'anexo'             => $this->anexo,
            'estado'            => $this->estado,
            'timestamps' => [
                'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i')
            ],
            'links' => [
                'self'          => route('servicio-esp.show', $this->id),
                'actividades'   => route('servicio-esp.actividades.index', $this->id),
            ]
        ];
    }
}

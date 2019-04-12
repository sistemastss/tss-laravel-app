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
            'evaluado'          => $this->evaluado,
            'tipoDocumento'     => $this->tipo_documento,
            'documento'         => $this->documento,
            'telefono'          => $this->telefono,
            'email'             => $this->email,
            'ciudad'            => $this->ciudad,
            'direccion'         => $this->direccion,
            'observaciones'     => $this->observaciones,
            'tipoEsp'           => $this->tipo_esp,
            'anexo'             => $this->anexo,
            'estado'            => $this->estado,
            'tipoServicio'      => $this->tipo_servicio,
            'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
            'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i'),
            'links' => [
                'self'          => route('servicio-esp.show', $this->id),
                'actividades'   => route('servicio-esp.actividades.index', $this->id),
            ]
        ];
    }
}

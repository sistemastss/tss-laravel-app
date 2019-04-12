<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PoligrafiaResource extends JsonResource
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
            'departamento'      => $this->departamento,
            'ciudad'            => $this->ciudad,
            'telefono'          => $this->telefono,
            'email'             => $this->email,
            'contexto'          => $this->contexto,
            'tipoPoligrafia'    => $this->tipo_poligrafia,
            'anexo'             => $this->anexo,
            'estado'            => $this->estado,
            'tipoServicio'      => $this->tipo_servicio,
            'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
            'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i'),

        ];
    }
}

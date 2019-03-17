<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FuncionarioResource extends JsonResource
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
            'id'               => $this->resource->id,
            'rol'              => $this->resource->roles,
            'identificacion'   => $this->resource->identificacion,
            'nombre'           => $this->resource->nombre,
            'direccion'        => $this->resource->direccion,
            'mail'             => $this->resource->mail,
            'telefono'         => $this->resource->telefono,
            'active'           => $this->resource->active,
        ];
    }
}

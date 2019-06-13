<?php

namespace Modules\Shared\Transformers;

use Illuminate\Http\Resources\Json\Resource;

class EvaluadoResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'evaluado'          => $this->evaluado,
            'tipo_documento'    => $this->tipo_documento,
            'documento'         => $this->documento,
            'telefono'          => $this->telefono,
            'email'             => $this->email,
            'direccion'         => $this->direccion,
        ];
    }
}

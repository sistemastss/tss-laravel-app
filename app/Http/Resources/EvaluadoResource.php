<?php

namespace App\Http\Resources;

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
            'cargo'             => $this->cargo,
            'direccion'         => $this->direccion,
        ];
    }
}

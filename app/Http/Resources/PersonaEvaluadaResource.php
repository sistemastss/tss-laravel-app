<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PersonaEvaluadaResource extends JsonResource
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
            'id' => $this->id,
            'nombre' => $this->nombre,
            'documento' => $this->numero_identificacion,
            'departamento' => $this->departamento,
            'ciudad' => $this->ciudad,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'observaciones' => $this->observaciones,
            'anexo' => $this->anexo,
        ];
    }
}

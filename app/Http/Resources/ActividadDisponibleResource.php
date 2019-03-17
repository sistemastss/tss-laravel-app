<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ActividadDisponibleResource extends JsonResource
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
            'codigo'        => $this->codigo,
            'nombre'        => $this->nombre,
            'tiempos'       => $this->tiempos,
            'codigoServicio'=> $this->servicio_disp_codigo
        ];
    }
}

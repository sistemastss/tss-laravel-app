<?php

namespace App\Http\Resources;

use App\ActividadAsignada;
use Illuminate\Http\Resources\Json\JsonResource;

class PersonasEvaluadasResource extends JsonResource
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
            'servicioEsp' => [
                'id'              => $this->servicioEsp->id,
                'centroCosto'     => new CentroCostoResource($this->servicioEsp->centroCosto),
                'descripcion'     => $this->servicioEsp->descrnipcion,
                'ciudad'          => $this->servicioEsp->ciudad_prueba,
                'estado'          => $this->servicioEsp->estado,
                'fechaCreacion'   => $this->servicioEsp->created_at->format('Y-m-d H:i')
            ],
            'nombre'                => $this->nombre,
            'numeroIdentificacion'  => $this->numero_identificacion,
            'departamento'          => $this->departamento,
            'ciudad'                => $this->ciudad,
            'telefono'              => $this->telefono,
            'email'                 => $this->email,
            'observaciones'         => $this->observaciones,
            'anexo'                 => $this->anexo,
        ];
    }
}

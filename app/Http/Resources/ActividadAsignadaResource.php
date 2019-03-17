<?php

namespace App\Http\Resources;

use App\Http\Resources\Usuarios\FreelanceResource;
use App\PersonaEvaluada;
use Illuminate\Http\Resources\Json\JsonResource;

class ActividadAsignadaResource extends JsonResource
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
            'usuarioId' => $this->funcionario->id,
            'usuarioNombre' => $this->funcionario->nombre,
            'timestamps' => [
                //'fechaAceptacion' => $this->fecha_aceptacion,
                'fechaCreacion' => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion' => $this->updated_at->format('Y-m-d H:i')
            ]
        ];
    }

}

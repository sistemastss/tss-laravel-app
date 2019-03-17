<?php

namespace App\Http\Resources\VerificacionAcademica;

use Illuminate\Http\Resources\Json\JsonResource;

class VerificacionAcademicaResource extends JsonResource
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
            'id'            => $this->id,
            'nivel'         => $this->nivel,
            'institucion'   => $this->institucion,
            'titulo'        => $this->titulo,
            'anno'          => $this->anno,
            'ciudad'        => $this->ciudad,
            'confirmacion'  => $this->confirmacion,
            'observacion'   => $this->observacion,
            /*'timestamp' => [
                'fechaCreacion' => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion' => $this->updated_at->format('Y-m-d H:i')
            ]*/
        ];
    }
}

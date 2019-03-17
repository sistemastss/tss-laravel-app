<?php

namespace App\Http\Resources\Usuarios;

use Illuminate\Http\Resources\Json\JsonResource;

class FreelanceResource extends JsonResource
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
            'identificacion'    => $this->identificacion,
            'nombre'            => $this->nombre,
            'direccion'         => $this->direccion,
            'mail'              => $this->mail,
            'telefono'          => $this->telefono,
            'timestamp' => [
                'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i')
            ]
        ];
    }
}

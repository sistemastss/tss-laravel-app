<?php

namespace App\Http\Resources;

use App\Roles;
use Illuminate\Http\Resources\Json\JsonResource;

class UsuarioResource extends JsonResource
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
            'rol'               => $this->roles,
            'identificacion'    => $this->identificacion,
            'nombre'            => $this->nombre,
            'direccion'         => $this->direccion,
            'mail'              => $this->mail,
            'telefono'          => $this->telefono,
            'apiToken'          => $this->api_token
        ];
    }
}

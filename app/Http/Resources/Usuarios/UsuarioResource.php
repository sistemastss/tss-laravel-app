<?php

namespace App\Http\Resources\Usuarios;

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
            'id' => $this->id,
            'rol' => $this->when($this->rol, $this->rol),
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'tipo_documento' => $this->tipo_documento,
            'documento' => $this->documento,
            'ciudad' => $this->ciudad,
            'email' => $this->email,
            'cliente' => $this->when($this->cliente, $this->cliente)
        ];
    }
}

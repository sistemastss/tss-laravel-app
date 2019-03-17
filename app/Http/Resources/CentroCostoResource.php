<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CentroCostoResource extends JsonResource
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
            'ordenCompra'       => $this->when($this->ordenCompra, new OrdenCompraResource($this->ordenCompra)),
            'solicitante'       => $this->solicitante,
            'direccion'         => $this->usuario->direccion,
            'mail'              => $this->usuario->mail
        ];
    }
}

<?php

namespace Modules\Shared\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class OrdenCompraResource extends JsonResource
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
            'numero_orden'   => $this->numero_orden_compra,
            'anexo'         => $this->anexo
        ];
    }
}

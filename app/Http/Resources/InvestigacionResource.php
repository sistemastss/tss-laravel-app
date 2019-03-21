<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InvestigacionResource extends JsonResource
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
            'centroCosto'       => new CentroCostoResource($this->servicio->centroCosto),
            'adjunto'           => $this->servicio->adjunto,
            'clase'             => $this->servicio->clase,
            'anexo'             => $this->servicio->anexo,
            'estado'            => $this->servicio->estado,
        ];
    }
}

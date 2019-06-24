<?php

namespace App\Http\Resources\Esp;

use App\Http\Resources\CentroCostoResource;
use App\Http\Resources\EvaluadoResource;
use Illuminate\Http\Resources\Json\Resource;


class EspResource extends Resource
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
            'id'                    => $this->id,
            'centro_costo'          => new CentroCostoResource($this->centroCosto),
            'evaluado'              => new EvaluadoResource($this->evaluado),
            'lugar_desarrollo'      => $this->lugar_desarrollo,
            'tipo_esp'              => $this->tipo_esp,
            'anexo'                 => $this->anexo,
            'estado'                => $this->estado,
            'tipo_servicio'         => $this->tipo_servicio,
            'fecha_creacion'        => $this->created_at->format('Y-m-d'),
            'fecha_actualizacion'   => $this->updated_at->format('Y-m-d'),
        ];
    }
}

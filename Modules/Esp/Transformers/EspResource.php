<?php

namespace Modules\Esp\Transformers;

use Illuminate\Http\Resources\Json\Resource;
use Modules\Shared\Transformers\CentroCostoResource;
use Modules\Shared\Transformers\EvaluadoResource;


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
            'links' => [
                'self'          => route('esp.show', $this->id),
                // 'actividades'   => route('esp.actividades.index', $this->id),
            ]
        ];
    }
}

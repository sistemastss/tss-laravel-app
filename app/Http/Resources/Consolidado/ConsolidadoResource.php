<?php

namespace App\Http\Resources\Consolidado;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsolidadoResource extends JsonResource
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
            'id'                        => $this->id,
            'antecedentes'              => $this->antecedentes,
            'antecedentesObservacion'   => $this->antecedentes_obs,
            'poligrafia'                => $this->poligrafia,
            'poligrafiaObservacion'     => $this->poligrafia_obs,
            'financiero'                => $this->financiero,
            'financieroObservacion'     => $this->financiero_obs,
            'licenciaConduccion'        => $this->licencia_conduccion,
            'cat'                       => $this->cat,
            'vigencia'                  => $this->vigencia,
            'comparendos'               => $this->comparendos,
            'historial'                 => $this->historial,
            'firma'                     => $this->firma,
            'conclusion'                => $this->conclucion,
            'observacion'               => $this->observacion,
        ];
    }
}

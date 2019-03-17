<?php

namespace App\Http\Resources\Consolidado;

use Illuminate\Http\Resources\Json\JsonResource;

class DatosInformeResource extends JsonResource
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
            'encabezado'                => $this->encabezado,
            'fotoEvaluado'              => $this->foto_evaluado,
            'logoCliente'               => $this->logo_cliente,
            'nucleoFamiliar'            => $this->nucleo_familiar,
            'verficacionVa'             => $this->verficacion_va,
            'verficacionVl'             => $this->verficacion_vl,
            'referenciasBancarias'      => $this->referencias_bancarias,
            'capacidadEndeudamiento'    => $this->capacidad_endeudamiento,
            'estudioFinanciero'         => $this->estudio_financiero,
            'historialJudicial'         => $this->historial_judicial,
            'evaluacionSeguridad'       => $this->evaluacion_seguridad,
        ];
    }
}

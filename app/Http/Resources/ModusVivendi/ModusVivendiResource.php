<?php

namespace App\Http\Resources\ModusVivendi;

use Illuminate\Http\Resources\Json\JsonResource;

class ModusVivendiResource extends JsonResource
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
            'id'                     => $this->id,
            'salario'                => $this->salario,
            'otrosIngresos'          => $this->otros_ingresos,
            'salarioConyugue'        => $this->salario_conyuge,
            'engresosMensuales'      => $this->egresos_mensuales,
            'descripcionGastos'      => $this->descripcion_gastos,
            'personasDependientes'   => $this->personas_dependientes,
            'analisisPatrimonial'    => $this->analisis_patrimonial,
            'estado'                 => $this->estado,
            'timestamps' => [
                'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i'),
            ],
            'links' => [
                'servicioEsp' => route('servicio-esp.show', $this->servicio_esp_id),
            ]
        ];
    }
}

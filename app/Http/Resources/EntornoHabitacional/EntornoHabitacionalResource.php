<?php

namespace App\Http\Resources\EntornoHabitacional;

use Illuminate\Http\Resources\Json\JsonResource;

class EntornoHabitacionalResource extends JsonResource
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
            'tipoVivienda'              => $this->tipo_vivienda,
            'tenencia'                  => $this->tenencia,
            'tiempoPermanencia'         => $this->tiempo_permanencia,
            'infoPropietario'           => $this->propietario,
            'fotografia'                => $this->fotografia,
            'estadoGeneral'             => $this->estado_general,
            'acabados'                  => $this->acabados,
            'dotacion'                  => $this->dotacion,
            'salubridad'                => $this->salubridad,
            'estrato'                   => $this->estrato,
            'serviciosPublicos'         => $this->servicios_publicos,
            'distribucion'              => $this->distribucion_vivienda,
            'ciudad'                    => $this->ciudad,
            'barrio'                    => $this->barrio,
            'localidad'                 => $this->localidad,
            'viasAcceso'                => $this->vias_acceso,
            'transportePublico'         => $this->transporte_publico,
            'centrosAsistenciales'      => $this->centros_asistenciales,
            'flujoVehicular'            => $this->flujo_vehicular,
            'nivelSeguridad'            => $this->nivel_seguridad,
            'estado'                    => $this->estado,
            'timestamps' => [
                'fechaCreacion' => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion' => $this->updated_at->format('Y-m-d H:i')
            ],
            'links' => [
                'servicioEsp' => route('servicio-esp.show', $this->servicio_esp_id)
            ]
        ];
    }
}

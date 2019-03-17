<?php

namespace App\Http\Resources\NucleoFamiliar;

use Illuminate\Http\Resources\Json\JsonResource;

class NucleoFamiliarResource extends JsonResource
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
            'nombre'                => $this->nombre,
            'edad'                  => $this->edad,
            'identificacion'        => $this->numero_identificacion,
            'lugarExpedicion'       => $this->lugar_expedicion,
            'lugarNacimiento'       => $this->lugar_nacimiento,
            'fechaNacimiento'       => $this->fecha_nacimiento,
            'ocupacion'             => $this->ocupacion,
            'empresa'               => $this->empresa,
            'telefono'              => $this->telefono,
            'tiempoLaborado'        => $this->tiempo_laborado,
            //'hijos'                 => HijosResource::collection($this->hijos),
            //'informacionFamiliar'   => InformacionFamiliarResource::collection($this->informacionFamiliar),
            //'referencias'           => ReferenciasResource::collection($this->referencias),
            'fotografia'            => $this->fotografia,
            'observaciones'            => $this->observaciones,
            'estado'                => $this->estado,
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

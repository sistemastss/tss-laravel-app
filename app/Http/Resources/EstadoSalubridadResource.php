<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EstadoSalubridadResource extends JsonResource
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
            'id'                      => $this->id,
            'tomaMedicamentos'        => $this->toma_medicamentos,
            'sufreEnfermedades'       => $this->sufre_enfermedades,
            'tratamientoPsicologico'  => $this->tratamiento_psicologico,
            'fuma'                    => $this->fuma,
            'consumeAlcohol'          => $this->consume_alcohol,
            'consumeDrogas'           => $this->consume_drogas,
            'realizaDeporte'          => $this->realiza_deporte,
            'hobbies'                 => $this->hobbies,
            'estado'                  => $this->estado,
            'timestamps' => [
                'fechaCreacion'      => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion' => $this->updated_at->format('Y-m-d H:i')
            ],
            'links' => [
                'self'          => route('servicio-esp.verificacion-documental.index', $this->id),
                'servicioEsp'   => route('servicio-esp.index', $this->servicio_esp_id)
            ]
        ];
    }
}

<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class VerificacionDocumentalResource extends JsonResource
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
            'documento'             => $this->cedula_ciudadania,
            'libretaMilitar'        => $this->libreta_militar,
            'licenciaConduccion'    => $this->licencia_conduccion,
            'tarjetaProfesional'    => $this->tarjeta_profesional,
            'diplomaBachiller'      => $this->diploma_bachiller,
            'diplomaTecnico'        => $this->diploma_tecnico,
            'diplomaTecnologo'      => $this->diploma_tecnologo,
            'diplomaPregrado'       => $this->diploma_pregrado,
            'diplomaPostgrado'      => $this->diploma_postgrado,
            'diplomaCursos'         => $this->diploma_cursos,
            'observaciones'         => $this->observaciones,
            'estado'                => $this->estado,
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

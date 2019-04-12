<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ServicioResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $tipoServicio = $this->tipo_servicio;

        switch ($tipoServicio) {
            case 'pol':
                $poligrafia = $this->poligrafia;
                return [
                    'centroCostoId'     => $this->centroCosto->id,
                    'ciudadDesarrollo'  => $this->ciudad,
                    'anexo'             => $this->anexo,
                    'tipoServicio'      => $this->tipo_servicio,
                    'evaluado'          => $poligrafia->evaluado,
                    'documento'         => $poligrafia->documento,
                    'departamento'      => $poligrafia->departamento,
                    'telefono'          => $poligrafia->telefono,
                    'email'             => $poligrafia->email,
                    'contexto'          => $poligrafia->contexto,
                    'tipo_poligrafia'   => $poligrafia->tipo_poligrafia,
                ];

            case 'esp':
                $esp = $this->esp;
                return [
                    'centroCostoId'     => $this->centroCosto->id,
                    'ciudadDesarrollo'  => $this->ciudad,
                    'anexo'             => $this->anexo,
                    'tipoServicio'      => $this->tipo_servicio,
                    'evaluado'          => $esp->evaluado,
                    'documento'         => $esp->documento,
                    'departamento'      => $esp->departamento,
                    'telefono'          => $esp->telefono,
                    'email'             => $esp->email,
                    'contexto'          => $esp->contexto,
                    'tipo_poligrafia'   => $esp->tipo_poligrafia,
                ];

            case 'inv':
                return [
                    'centroCostoId'     => $this->centroCosto->id,
                    'ciudadDesarrollo'  => $this->ciudad,
                    'anexo'             => $this->anexo,
                    'tipoServicio'      => $this->tipo_servicio,
                ];

        }


        /*return [
            'centroCosto'   => new CentroCostoResource($this->centroCosto),
            'adjunto'       => $this->centroCosto->solicitante,
            'clase'         => $this->clase,
            'anexo'         => $this->anexo,
            // 'informe'    => $this->informe,
            'estado'        => $this->estado,
            'fechaCreacion' => $this->created_at->format('Y-m-d H:i'),
            'links' => [
                // 'self'          => route('servicio-esp.show', $this->id),
                // 'actividades'   => route('servicio-esp.actividades.index', $this->id),
            ]
        ];*/
    }
}

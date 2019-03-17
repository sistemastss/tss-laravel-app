<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class HistorialjudicialResource extends JsonResource
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
            'procesoJuridico'           => $this->proceso_juridico,
            'procesoProcuraduria'       => $this->proceso_procuraduria,
            'procesoContraloria'        => $this->proceso_contraloria,
            'procesoFiscalia'           => $this->proceso_fiscalia,
            'procesoPolicia'            => $this->proceso_policia,
            'procesoTransito'           => $this->proceso_transito,
            'verificacion'              => $this->verificacion,
            'ordenCapturaInternacional' => $this->orden_captura_internacional,
            'sancionesPenales'          => $this->sanciones_penales,
            'delitoProcuraduria'        => $this->delito_procuraduria,
            'inhabilidadesProcuraduria' => $this->inhabilidades_procuraduria,
            'fechaInhabilidad'          => $this->fecha_inhabilidad,
            'antecedentesFiscales'      => $this->antecedentes_fiscales,
            'fechaAntecedente'          => $this->fecha_antecedente,
            'claseProceso'              => $this->clase_proceso,
            'datosSentencia'            => $this->datos_sentencia,
            'delitoJudicial'            => $this->delito_judicial,
            'situacionJuridica'         => $this->situacion_juridica,
            'fgnNs'                     => $this->f_g_n_ns,
            'listaOfac'                 => $this->lista_ofac,
            'listaOnu'                  => $this->lista_onu,
            'vinculosSubversion'        => $this->vinculos_subversion,
            'antecedentesPolicia'       => $this->antecedentes_policia,
            'paramilitarismo'           => $this->paramilitarismo,
            'movilidad'                 => $this->movilidad,
            'totalAdeudado'             => $this->total_adeudado,
            'observaciones'             => $this->observaciones,
            'timestamps' => [
                'fechaCreacion'         => $this->created_at->format('Y-m-d H:i'),
                'fechaActualizacion'    => $this->updated_at->format('Y-m-d H:i')
            ],
            'links' => [
                'self'          => route('servicio-esp.historial-judicial.index', $this->servicio_esp_id),
                'servicioEsp'   => route('servicio-esp.show', $this->servicio_esp_id),
            ]

        ];
    }
}

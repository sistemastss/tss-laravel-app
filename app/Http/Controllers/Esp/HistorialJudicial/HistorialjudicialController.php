<?php

namespace App\Http\Controllers\Esp\HistorialJudicial;

use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\HistorialJudicial;
use App\Http\Controllers\ApiController;
use App\Http\Resources\HistorialjudicialResource;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HistorialjudicialController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->historialJudicial()->firstOrFail();
        $data = new HistorialjudicialResource($record);
        return $this->showOne($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        if ($servicioEsp->historialJudicial()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $value = $this->transformRequest($request);
        $record = $servicioEsp->historialJudicial()->create($value);
        $data = new HistorialjudicialResource($record);
        return $this->showOne($data, Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ServicioEsp $servicioEsp
     * @param $historialJudicial
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $historialJudicial)
    {
        $record = $servicioEsp->historialJudicial()->findOrFail($historialJudicial);
        $value = $this->transformRequest($request);

        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new HistorialjudicialResource($record);
        return $this->showOne($data);
    }


    /**
     * Transform the data of the request
     *
     * @param Request $request
     * @return array
     * @throws
     */
    private function transformRequest(Request $request)
    {
        $rules = [
            'procesoJuridico'           => 'required|boolean',
            'procesoProcuraduria'       => 'required|boolean',
            'procesoContraloria'        => 'required|boolean',
            'procesoFiscalia'           => 'required|boolean',
            'procesoPolicia'            => 'required|boolean',
            'procesoTransito'           => 'required|boolean',
            'verificacion'              => 'required|boolean',
            'ordenCapturaInternacional' => 'required|boolean',
            'sancionesPenales'          => 'required|string',
            'delitoProcuraduria'        => 'required|string',
            'inhabilidadesProcuraduria' => 'required|string',
            'fechaInhabilidad'          => 'required|date',
            'antecedentesFiscales'      => 'required|boolean',
            'fechaAntecedente'          => 'required|date',
            'claseProceso'              => 'required|string',
            'datosSentencia'            => 'required|string',
            'delitoJudicial'            => 'required|string',
            'situacionJuridica'         => 'required|string',
            'fgnNs'                     => 'required|string',
            'listaOfac'                 => 'required|boolean',
            'listaOnu'                  => 'required|boolean',
            'vinculosSubversion'        => 'required|boolean',
            'antecedentesPolicia'       => 'required|boolean',
            'paramilitarismo'           => 'required|boolean',
            'movilidad'                 => 'required|string',
            'totalAdeudado'              => 'required|numeric',
            'observaciones'             => 'required|string',
        ];

        $this->validate($request, $rules);

        return [
            'proceso_juridico'              => $request->get('procesoJuridico'),
            'proceso_procuraduria'          => $request->get('procesoProcuraduria'),
            'proceso_contraloria'           => $request->get('procesoContraloria'),
            'proceso_fiscalia'              => $request->get('procesoFiscalia'),
            'proceso_policia'               => $request->get('procesoPolicia'),
            'proceso_transito'              => $request->get('procesoTransito'),
            'verificacion'                  => $request->get('verificacion'),
            'orden_captura_internacional'   => $request->get('ordenCapturaInternacional'),
            'sanciones_penales'             => $request->get('sancionesPenales'),
            'delito_procuraduria'           => $request->get('delitoProcuraduria'),
            'inhabilidades_procuraduria'    => $request->get('inhabilidadesProcuraduria'),
            'fecha_inhabilidad'             => $request->get('fechaInhabilidad'),
            'antecedentes_fiscales'         => $request->get('antecedentesFiscales'),
            'fecha_antecedente'             => $request->get('fechaAntecedente'),
            'clase_proceso'                 => $request->get('claseProceso'),
            'datos_sentencia'               => $request->get('datosSentencia'),
            'delito_judicial'               => $request->get('delitoJudicial'),
            'situacion_juridica'            => $request->get('situacionJuridica'),
            'f_g_n_ns'                      => $request->get('fgnNs'),
            'lista_ofac'                    => $request->get('listaOfac'),
            'lista_onu'                     => $request->get('listaOnu'),
            'vinculos_subversion'           => $request->get('vinculosSubversion'),
            'antecedentes_policia'          => $request->get('antecedentesPolicia'),
            'paramilitarismo'               => $request->get('paramilitarismo'),
            'movilidad'                     => $request->get('movilidad'),
            'total_adeudado'                => $request->get('totalAdeudado'),
            'observaciones'                 => $request->get('observaciones'),
        ];
    }
}

<?php

namespace App\Http\Controllers\Esp\Consolidado;

use App\Consolidado;
use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Consolidado\DatosInformeResource;
use Illuminate\Http\Request;

class DatosInformeController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Consolidado $consolidado
     * @return \Illuminate\Http\Response
     */
    public function index(Consolidado $consolidado)
    {
        $record = $consolidado->datosInforme()->firstOrFail();
        $data = new DatosInformeResource($record);
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Consolidado $consolidado
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, Consolidado $consolidado)
    {
        if ($consolidado->datosInforme()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $value = $this->transformRequest($request);
        $record = $consolidado->datosInforme()->create($value);
        $data = new DatosInformeResource($record);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param Consolidado $consolidado
     * @param $consolidado
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, Consolidado $consolidado, $datosInforme)
    {
        $record = $consolidado->datosInforme()->findOrFail($datosInforme);
        $value = $this->transformRequest($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $data = new DatosInformeResource($record);
        return $this->showOne($data);
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function transformRequest(Request $request) {
        $rules = [
            'encabezado'                => 'required|boolean',
            'fotoEvaluado'              => 'required|boolean',
            'logoCliente'               => 'required|boolean',
            'nucleoFamiliar'            => 'required|boolean',
            'verficacionVa'             => 'required|boolean',
            'verficacionVl'             => 'required|boolean',
            'referenciasBancarias'      => 'required|boolean',
            'capacidadEndeudamiento'    => 'required|boolean',
            'estudioFinanciero'         => 'required|boolean',
            'historialJudicial'         => 'required|boolean',
            'evaluacionSeguridad'       => 'required|boolean',
        ];

        $this->validate($request, $rules);

        $value = [
            'encabezado'                => $request->get('encabezado'),
            'foto_evaluado'             => $request->get('fotoEvaluado'),
            'logo_cliente'              => $request->get('logoCliente'),
            'nucleo_familiar'           => $request->get('nucleoFamiliar'),
            'verficacion_va'            => $request->get('verficacionVa'),
            'verficacion_vl'            => $request->get('verficacionVl'),
            'referencias_bancarias'     => $request->get('referenciasBancarias'),
            'capacidad_endeudamiento'   => $request->get('capacidadEndeudamiento'),
            'estudio_financiero'        => $request->get('estudioFinanciero'),
            'historial_judicial'        => $request->get('historialJudicial'),
            'evaluacion_seguridad'      => $request->get('evaluacionSeguridad'),
        ];

        return $value;
    }
}
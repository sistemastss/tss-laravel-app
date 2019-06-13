<?php

namespace App\Http\Controllers\Esp\Consolidado;

use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Resources\Consolidado\ConsolidadoResource;
use App\ServicioEsp;
use Illuminate\Http\Request;

class ConsolidadoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->consolidado()->firstOrFail();
        $data = new ConsolidadoResource($record);
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ServicioEsp $servicioEsp
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        if ($servicioEsp->consolidado()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $value = $this->transformRequest($request);
        $record = $servicioEsp->consolidado()->create($value);
        $data = new ConsolidadoResource($record);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ServicioEsp $servicioEsp
     * @param $consolidado
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $consolidado)
    {
        $record = $servicioEsp->consolidado()->findOrFail($consolidado);
        $value = $this->transformRequest($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $data = new ConsolidadoResource($record);
        return $this->showOne($data);
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function transformRequest(Request $request) {
        $rules = [
            'antecedentes'                  => 'required|boolean',
            'antecedentesObservacion'       => 'required|string',
            'poligrafia'                    => 'required|boolean',
            'poligrafiaObservacion'         => 'required|string',
            'financiero'                    => 'required|boolean',
            'financieroObservacion'         => 'required|string',
            'licenciaConduccion'            => 'required|boolean',
            'cat'                           => 'required|numeric',
            'vigencia'                      => 'required|date',
            'comparendos'                   => 'required|boolean',
            'historial'                     => 'required|string',
            'firma'                         => 'required',
            'conclusion'                    => 'required|boolean',
            'observacion'                   => 'required|string',
        ];

        $this->validate($request, $rules);

        $value = [
            'antecedentes'          => $request->get('antecedentes'),
            'antecedentes_obs'      => $request->get('antecedentesObservacion'),
            'poligrafia'            => $request->get('poligrafia'),
            'poligrafia_obs'        => $request->get('poligrafiaObservacion'),
            'financiero'            => $request->get('financiero'),
            'financiero_obs'        => $request->get('financieroObservacion'),
            'licencia_conduccion'   => $request->get('licenciaConduccion'   ),
            'cat'                   => $request->get('cat'),
            'vigencia'              => $request->get('vigencia'),
            'comparendos'           => $request->get('comparendos'),
            'historial'             => $request->get('historial'),
            'firma'                 => $request->get('firma'),
            'conclucion'            => $request->get('conclusion'),
            'observacion'           => $request->get('observacion'),
        ];

        return $value;
    }
}

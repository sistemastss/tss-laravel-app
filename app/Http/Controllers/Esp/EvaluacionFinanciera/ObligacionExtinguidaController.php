<?php

namespace App\Http\Controllers\Esp\EvaluacionFinanciera;

use App\EvaluacionFinanciera;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\EvaluacionFinanciera\ObligacionExtinguidaResource;
use App\ObligacionExtinguida;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ObligacionExtinguidaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $records = $servicioEsp->obligacionesExtinguidas()->get();

        if ($records->count() == 0) {
            Helper::throwModelNotFoud(ObligacionExtinguida::class);
        }

        $data = ObligacionExtinguidaResource::collection($records);
        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request,ServicioEsp $servicioEsp)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->obligacionesExtinguidas()->create($value);
        $data = new ObligacionExtinguidaResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $obligacionExtinguida
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $obligacionExtinguida)
    {
        $record = $servicioEsp->obligacionesExtinguidas()->findOrFail($obligacionExtinguida);
        $value = $this->transformRequest($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new ObligacionExtinguidaResource($record);
        return $this->showOne($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $obligacionExtinguida
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $obligacionExtinguida)
    {
        $record = $servicioEsp->obligacionesExtinguidas()->findOrFail($obligacionExtinguida);
        $isDeleted = $record->delete();

        if ($isDeleted) {
            return $this->showMessage(Helper::RECORD_DELETED, Response::HTTP_ACCEPTED);
        }
    }


    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function transformRequest(Request $request) {
        $rules = [
            'entidad'       => 'required|string',
            'fechaApertura' => 'required|date',
            'fechaCierre'   => 'required|date',
            'tipoCredito'   => 'required|string',
            'valor'         => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $value = [
            'entidad'           => $request->get('entidad'),
            'fecha_apertura'    => $request->get('fechaApertura'),
            'fecha_cierre'      => $request->get('fechaCierre'),
            'tipo_credito'      => $request->get('tipoCredito'),
            'valor'             => $request->get('valor'),
        ];

        return $value;
    }
}

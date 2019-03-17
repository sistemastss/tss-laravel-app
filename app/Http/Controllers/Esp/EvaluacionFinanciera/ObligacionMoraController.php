<?php

namespace App\Http\Controllers\Esp\EvaluacionFinanciera;

use App\EvaluacionFinanciera;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\EvaluacionFinanciera\ObligacionMoraResource;
use App\ObligacionMora;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ObligacionMoraController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $records = $servicioEsp->obligacionesMora()->get();

        if ($records->count() == 0) {
            Helper::throwModelNotFoud(ObligacionMora::class);
        }

        $data = ObligacionMoraResource::collection($records);
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
        $record = $servicioEsp->obligacionesMora()->create($value);
        $data = new ObligacionMoraResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $obligacionMora
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $obligacionMora)
    {
        $record = $servicioEsp->obligacionesMora()->findOrFail($obligacionMora);
        $value = $this->transformRequest($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new ObligacionMoraResource($record);
        return $this->showOne($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $obligacionMora
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $obligacionMora)
    {
        $record = $servicioEsp->obligacionesMora()->findOrFail($obligacionMora);
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
            'entidad'       => 'required',
            'tipoCredito'   => 'required',
            'tiempoMora'    => 'required',
            'montoMora'     => 'required',
        ];

        $this->validate($request, $rules);

        $value = [
            'entidad'       => $request->get('entidad'),
            'tipo_credito'  => $request->get('tipoCredito'),
            'tiempo_mora'   => $request->get('tiempoMora'),
            'monto_mora'    => $request->get('montoMora'),
        ];

        return $value;
    }
}

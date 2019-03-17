<?php

namespace App\Http\Controllers\Esp\EvaluacionFinanciera;

use App\EvaluacionFinanciera;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\EvaluacionFinanciera\ObligacionVigenteResource;
use App\ObligacionVigente;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ObligacionVigenteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $records = $servicioEsp->obligacionesVigentes()->get();

        if ($records->count() == 0) {
            Helper::throwModelNotFoud(ObligacionVigente::class);
        }

        $data = ObligacionVigenteResource::collection($records);
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
        $record = $servicioEsp->obligacionesVigentes()->create($value);
        $data = new ObligacionVigenteResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $obligacionVigente
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $obligacionVigente)
    {
        $record = $servicioEsp->obligacionesVigentes()->findOrFail($obligacionVigente);
        $value = $this->transformRequest($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new ObligacionVigenteResource($record);
        return $this->showOne($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $obligacionVigente
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $obligacionVigente)
    {;
        $record = $servicioEsp->obligacionesVigentes()->findOrFail($obligacionVigente);
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
            'tipoCredito'   => 'required|string',
            'valorAprobado' => 'required|numeric',
            'saldoActual'   => 'required|numeric',
            'valorCuota'    => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $value = [
            'entidad'        => $request->get('entidad'),
            'tipo_credito'   => $request->get('tipoCredito'),
            'valor_aprobado' => $request->get('valorAprobado'),
            'saldo_actual'   => $request->get('saldoActual'),
            'valor_cuota'    => $request->get('valorCuota'),
        ];

        return $value;
    }
}

<?php

namespace App\Http\Controllers\Esp\EvaluacionFinanciera;

use App\CuentaBancaria;
use App\EvaluacionFinanciera;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\EvaluacionFinanciera\CuentaBancariaResource;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CuentaBancariaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->cuentasBancarias()->get();

        if ($record->count() == 0) {
            Helper::throwModelNotFoud(CuentaBancaria::class);
        }

        $data = CuentaBancariaResource::collection($record);
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
        $record = $servicioEsp->cuentasBancarias()->create($value);
        $data = new CuentaBancariaResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $cuentaBancaria
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $cuentaBancaria)
    {
        $record = $servicioEsp->cuentasBancarias()->findOrFail($cuentaBancaria);
        $value = $this->transformRequest($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new CuentaBancariaResource($record);
        return $this->showOne($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $cuentaBancaria
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $cuentaBancaria)
    {
        $record = $servicioEsp->cuentasBancarias()->findOrFail($cuentaBancaria);
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
            'tipoCuenta'    => 'required|string',
            'entidad'       => 'required|string',
            'ciudad'        => 'required|string',
            'fechaApertura' => 'required|string',
            'estado'        => 'required|string',
        ];

        $this->validate($request, $rules);

        $value = [
            'tipo_cuenta'       => $request->get('tipoCuenta'),
            'entidad'           => $request->get('entidad'),
            'ciudad'            => $request->get('ciudad'),
            'fecha_apertura'    => $request->get('fechaApertura'),
            'estado'            => $request->get('estado'),
        ];

        return $value;
    }
}

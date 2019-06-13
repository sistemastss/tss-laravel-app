<?php

namespace App\Http\Controllers\Esp\ModusVivendi;

use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\ModusVivendi\ReferenciasBancariasResource;
use App\ModusVivendi;
use App\ReferenciaBancaria;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReferenciaBancariaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->referenciasBancarias()->get();

        if ($record->count() == 0) {
            Helper::throwModelNotFoud(ReferenciaBancaria::class);
        }

        $data = ReferenciasBancariasResource::collection($record);
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
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->referenciasBancarias()->create($value);
        $data = new ReferenciasBancariasResource($record);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $referenciasBancarias
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $referenciasBancarias)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->referenciasBancarias()->findOrFail($referenciasBancarias);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new ReferenciasBancariasResource($record);
        return $this->showOne($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $referenciasBancarias
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $referenciasBancarias)
    {
        $record = $servicioEsp->referenciasBancarias()->findOrFail($referenciasBancarias);
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
    public function transformRequest(Request $request)
    {
        $rules = [
            'entidad'       => 'required',
            'tipoCuenta'    => 'required'
        ];

        $this->validate($request, $rules);

        $value = [
            'entidad'       => $request->get('entidad'),
            'tipo_cuenta'   => $request->get('tipoCuenta'),
        ];

        return $value;
    }
}

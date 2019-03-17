<?php

namespace App\Http\Controllers\Esp\NucleoFamiliar;

use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\NucleoFamiliar\ReferenciasResource;
use App\NucleoFamiliar;
use App\Referencia;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ReferenciaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->referencias()->get();

        if ($record->count() == 0) {
            Helper::throwModelNotFoud(Referencia::class);
        }

        $data = ReferenciasResource::collection($record);
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
        $record = $servicioEsp->referencias()->create($value);
        $data = new ReferenciasResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $referencia
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $referencia)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->referencias()->findOrFail($referencia);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new ReferenciasResource($record);
        return $this->showOne($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $referencia
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $referencia)
    {
        $record = $servicioEsp->referencias()->findOrFail($referencia);
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
            'nombre'        => 'required|string',
            'ocupacion'     => 'required|string',
            'telefono'      => 'required|numeric',
            'ciudad'        => 'required|string',
            'confirmacion'  => 'required',
        ];

        $this->validate($request, $rules);

        $value = [
            'nombre'        => $request->get('nombre'),
            'ocupacion'     => $request->get('ocupacion'),
            'telefono'      => $request->get('telefono'),
            'ciudad'        => $request->get('ciudad'),
            'confirmacion'  => $request->get('confirmacion'),
        ];

        return $value;
    }
}

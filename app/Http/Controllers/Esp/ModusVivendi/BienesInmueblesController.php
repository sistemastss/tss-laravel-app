<?php

namespace App\Http\Controllers\Esp\ModusVivendi;

use App\BienesInmuebles;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\ModusVivendi\BienesInmueblesResource;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BienesInmueblesController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->bienesInmuebles()->get();

        if ($record->count() == 0) {
            Helper::throwModelNotFoud(BienesInmuebles::class);
        }

        $data = BienesInmueblesResource::collection($record);
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
        $record = $servicioEsp->bienesInmuebles()->create($value);
        $data = new BienesInmueblesResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $bienesInmuebles
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $bienesInmuebles)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->bienesInmuebles()->findOrFail($bienesInmuebles);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new BienesInmueblesResource($record);
        return $this->showOne($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $bienesInmuebles
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $bienesInmuebles)
    {
        $record = $servicioEsp->bienesInmuebles()->findOrFail($bienesInmuebles);
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
            'tipo'      => 'required|string',
            'direccion' => 'required|string',
            'telefono'  => 'required|numeric',
            'ciudad'    => 'required|string',
            'avaluo'    => 'required|numeric',
            'hipoteca'  => 'required|boolean',
        ];

        $this->validate($request, $rules);

        $value = [
            'tipo'      => $request->get('tipo'),
            'direccion' => $request->get('direccion'),
            'telefono'  => $request->get('telefono'),
            'ciudad'    => $request->get('ciudad'),
            'avaluo'    => $request->get('avaluo'),
            'hipoteca'  => $request->get('hipoteca'),
        ];

        return $value;
    }
}

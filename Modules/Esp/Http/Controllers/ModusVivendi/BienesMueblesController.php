<?php

namespace App\Http\Controllers\Esp\ModusVivendi;

use App\BienesMuebles;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\ModusVivendi\BienesMueblesResource;
use App\ModusVivendi;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class BienesMueblesController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->bienesMuebles()->get();

        if ($record->count() == 0) {
            Helper::throwModelNotFoud(BienesMuebles::class);
        }

        $data = BienesMueblesResource::collection($record);
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
        $record = $servicioEsp->bienesMuebles()->create($value);
        $data = new BienesMueblesResource($record);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $bienesMuebles
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $bienesMuebles)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->bienesMuebles()->findOrFail($bienesMuebles);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new BienesMueblesResource($record);
        return $this->showOne($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $bienesMuebles
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $bienesMuebles)
    {
        $record = $servicioEsp->bienesMuebles()->findOrFail($bienesMuebles);
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
            'clase'     => 'required',
            'modelo'    => 'required',
            'placa'     => 'required',
            'avaluo'    => 'required|numeric',
            'pignorado' => 'required|boolean',
        ];

        $this->validate($request, $rules);

        $value = [
            'clase'     => $request->get('clase'),
            'modelo'    => $request->get('modelo'),
            'placa'     => $request->get('placa'),
            'avaluo'    => $request->get('avaluo'),
            'pignorado' => $request->get('pignorado'),
        ];

        return $value;
    }
}

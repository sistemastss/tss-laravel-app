<?php

namespace App\Http\Controllers\Esp\NucleoFamiliar;

use App\Exceptions\ModelNotUpdateException;
use App\Hijo;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\NucleoFamiliar\HijosResource;
use App\NucleoFamiliar;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HijoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->hijos()->get();

        if ($record->count() == 0) {
            Helper::throwModelNotFoud(Hijo::class);
        }

        $data = HijosResource::collection($record);
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
        $record = $servicioEsp->hijos()->create($value);
        $data = new HijosResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $hijo
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $hijo)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->hijos()->findOrFail($hijo);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new HijosResource($record);
        return $this->showOne($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  NucleoFamiliar $nucleoFamiliar
     * @param $hijo
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $hijo)
    {
        $record = $servicioEsp->hijos()->findOrFail($hijo);
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
            'edad'      => 'required|numeric',
            'nombre'    => 'required|string',
            'ocupacion' => 'required|string',
            'ubicacion' => 'required|string',
        ];

        $this->validate($request, $rules);

        $value = [
            'edad'      => $request->get('edad'),
            'nombre'    => $request->get('nombre'),
            'ocupacion' => $request->get('ocupacion'),
            'ubicacion' => $request->get('ubicacion'),
        ];

        return $value;
    }
}

<?php

namespace App\Http\Controllers\Esp\NucleoFamiliar;

use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\NucleoFamiliar\InformacionFamiliarResource;
use App\InformacionFamiliar;
use App\NucleoFamiliar;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InformacionFamiliarController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->informacionFamiliar()->get();

        if ($record->count() == 0) {
            Helper::throwModelNotFoud(InformacionFamiliar::class);
        }

        $data = InformacionFamiliarResource::collection($record);
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
        $record = $servicioEsp->informacionFamiliar()->create($value);
        $data = new InformacionFamiliarResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $informacionFamiliar
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $informacionFamiliar)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->informacionFamiliar()->findOrFail($informacionFamiliar);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new InformacionFamiliarResource($record);
        return $this->showOne($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $informacionFamiliar
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $informacionFamiliar)
    {
        $record = $servicioEsp->informacionFamiliar()->findOrFail($informacionFamiliar);
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
            'nombre'     => 'required|string',
            'edad'       => 'required|numeric',
            'ocupacion'  => 'required|string',
            'telefono'   => 'required|numeric',
            'ciudad'     => 'required|string',
            'parentesco' => 'required|string',
            'viveConUd'  => 'required|boolean',
        ];

        $this->validate($request, $rules);

        $value = [
            'nombre'        => $request->get('nombre'),
            'edad'          => $request->get('edad'),
            'ocupacion'     => $request->get('ocupacion'),
            'telefono'      => $request->get('telefono'),
            'ciudad'        => $request->get('ciudad'),
            'parentesco'    => $request->get('parentesco'),
            'vive_con_ud'   => $request->get('viveConUd'),
        ];

        return $value;
    }
}

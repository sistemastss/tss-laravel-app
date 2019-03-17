<?php

namespace App\Http\Controllers\Esp\ModusVivendi;

use App\CapacidadEndeudamiento;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\ModusVivendi\CapacidadEndeudamientoResource;
use App\ModusVivendi;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CapacidadEndeudamientoController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->capacidadEndeudamiento()->get();

        if ($record->count() == 0) {
            Helper::throwModelNotFoud(CapacidadEndeudamiento::class);
        }

        $data = CapacidadEndeudamientoResource::collection($record);
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
        $record = $servicioEsp->capacidadEndeudamiento()->create($value);
        $data = new CapacidadEndeudamientoResource($record);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $capacidadEndeudamiento
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $capacidadEndeudamiento)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->capacidadEndeudamiento()->findOrFail($capacidadEndeudamiento);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new CapacidadEndeudamientoResource($record);
        return $this->showOne($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $capacidadEndeudamiento
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $capacidadEndeudamiento)
    {
        $record = $servicioEsp->capacidadEndeudamiento()->findOrFail($capacidadEndeudamiento);
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
            'descripcion'   => 'required',
            'entidad'       => 'required',
            'monto'         => 'required|numeric',
            'estadoDeuda'   => 'required',
            'valorMensual'  => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $value = [
            'descripcion'   => $request->get('descripcion'),
            'entidad'       => $request->get('entidad'),
            'monto'         => $request->get('monto'),
            'estado_deuda'  => $request->get('estadoDeuda'),
            'valor_mensual' => $request->get('valorMensual'),
        ];

        return $value;
    }
}

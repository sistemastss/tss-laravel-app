<?php

namespace App\Http\Controllers\Esp\VerificacionLaboral;

use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\ServicioEsp;
use App\VerificacionLaboral;
use Illuminate\Http\Request;
use App\Http\Resources\VerificacionLaboral\VerificacionLaboralResource;
use Illuminate\Http\Response;

class VerificacionLaboralController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $recods = $servicioEsp->verificacionLaboral()->get();

        if ($recods->count() === 0) {
            Helper::throwModelNotFoud(VerificacionLaboral::class);
        }

        $data = VerificacionLaboralResource::collection($recods);
        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->verificacionLaboral()->create($value);
        $data = new VerificacionLaboralResource($record);
        return $this->showAll($data, Response::HTTP_CREATED);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $verificacionLaboral
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $verificacionLaboral)
    {
        $record = $servicioEsp->verificacionLaboral()->findOrFail($verificacionLaboral);
        $value = $this->transformRequest($request);

        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $data = new VerificacionLaboralResource($record);
        return $this->showAll($data, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ServicioEsp $servicioEsp
     * @param $verificacionLaboral
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $verificacionLaboral)
    {
        $record = $servicioEsp->verificacionLaboral()->findOrFail($verificacionLaboral);
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
    private function transformRequest(Request $request) {

        $rules = [
            'empresa'       => 'required|string',
            'cargo'         => 'required|string',
            'telefono'      => 'required|numeric',
            'periodo'       => 'required|string',
            'jefeInmediato' => 'required|string',
            'cargoJefe'     => 'required|string',
            'ciudad'        => 'required|string',
            'motivoRetiro'  => 'required|string',
            'confirmacion'  => 'required|boolean',
            'observaciones' => 'required|string',
        ];

        $this->validate($request, $rules);

        $value = [
            'empresa'           => $request->get('empresa'),
            'cargo'             => $request->get('cargo'),
            'telefono'          => $request->get('telefono'),
            'periodo'           => $request->get('periodo'),
            'jefe_inmediato'    => $request->get('jefeInmediato'),
            'cargo_jefe'        => $request->get('cargoJefe'),
            'ciudad'            => $request->get('ciudad'),
            'motivo_retiro'     => $request->get('motivoRetiro'),
            'confirmacion'      => $request->get('confirmacion'),
            'observaciones'     => $request->get('observaciones'),
        ];

        return $value;
    }
}

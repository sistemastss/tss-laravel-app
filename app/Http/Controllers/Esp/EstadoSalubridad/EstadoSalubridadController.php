<?php

namespace App\Http\Controllers\Esp\EstadoSalubridad;

use App\EstadoSalubridad;
use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Resources\EstadoSalubridadResource;
use App\ServicioEsp;
use Illuminate\Http\Request;

class EstadoSalubridadController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->estadoSalubridad()->firstOrFail();
        $data = new EstadoSalubridadResource($record);
        return $this->showOne($data);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        if ($servicioEsp->estadoSalubridad()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $value = $this->transformRequest($request);
        $record = $servicioEsp->estadoSalubridad()->create($value);
        $record->refresh();
        $data = new EstadoSalubridadResource($record);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\EstadoSalubridad $estadoSalubridad
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $estadoSalubridad)
    {
        $record = $servicioEsp->estadoSalubridad()->findOrFail($estadoSalubridad);
        $value = $this->transformRequest($request);

        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $record->refresh();
        $data = new EstadoSalubridadResource($record);
        return $this->showOne($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EstadoSalubridad  $estadoSalubridad
     * @return \Illuminate\Http\Response
     */
    public function destroy(EstadoSalubridad $estadoSalubridad)
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     * @throws
     */
    public function transformRequest(Request $request) {

        $rules = [
            'tomaMedicamentos'          => 'required',
            'sufreEnfermedades'           => 'required',
            'tratamientoPsicologico'    => 'required',
            'fuma'                      => 'required|boolean',
            'consumeAlcohol'            => 'required|boolean',
            'consumeDrogas'             => 'required|boolean',
            'realizaDeporte'            => 'required',
            'hobbies',
        ];

        $this->validate($request, $rules);

        return [
            'toma_medicamentos'         => $request->get('tomaMedicamentos'),
            'sufre_enfermedades'        => $request->get('sufreEnfermedades'),
            'tratamiento_psicologico'   => $request->get('tratamientoPsicologico'),
            'fuma'                      => $request->get('fuma'),
            'consume_alcohol'           => $request->get('consumeAlcohol'),
            'consume_drogas'            => $request->get('consumeDrogas'),
            'realiza_deporte'           => $request->get('realizaDeporte'),
            'hobbies'                   => $request->get('hobbies'),
        ];
    }
}

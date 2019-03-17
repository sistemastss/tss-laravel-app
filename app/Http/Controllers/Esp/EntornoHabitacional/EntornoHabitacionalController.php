<?php

namespace App\Http\Controllers\Esp\EntornoHabitacional;

use App\EntornoHabitacional;
use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Resources\EntornoHabitacional\EntornoHabitacionalResource;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EntornoHabitacionalController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->entornoHabitacional()->firstOrFail();
        $data = new EntornoHabitacionalResource($record);
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        if ($servicioEsp->entornoHabitacional()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $value = $this->transformRequest($request);
        $record = $servicioEsp->entornoHabitacional()->create($value);
        $record->refresh();
        $data = new EntornoHabitacionalResource($record);
        return $this->showOne($data, Response::HTTP_CREATED);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\EntornoHabitacional  $entornoHabitacional
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $entornoHabitacional)
    {
        $record = $servicioEsp->entornoHabitacional()->findOrFail($entornoHabitacional);
        $value = $this->transformRequest($request);



        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new EntornoHabitacionalResource($record);
        return $this->showOne($data, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\EntornoHabitacional  $entornoHabitacional
     * @return \Illuminate\Http\Response
     */
    public function destroy(EntornoHabitacional $entornoHabitacional)
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     * @throws
     */
    private function transformRequest(Request $request)
    {
        $rules = [
            'tipoVivienda'          => 'required',
            'tenencia'              => 'required',
            'tiempoPermanencia'     => 'required',
            'infoPropietario'       => 'required',
            'fotografia'            => 'required',
            'estadoGeneral'         => 'required',
            'acabados'              => 'required',
            'dotacion'              => 'required',
            'salubridad'            => 'required',
            'estrato'               => 'required',
            'serviciosPublicos'     => 'required',
            'distribucion'          => 'required',
            'ciudad'                => 'required',
            'barrio'                => 'required',
            'localidad'             => 'required',
            'viasAcceso'            => 'required',
            'transportePublico'     => 'required',
            'centrosAsistenciales'  => 'required',
            'flujoVehicular'        => 'required',
            'nivelSeguridad'        => 'required',

        ];

        $this->validate($request, $rules);

        return [
            'tipo_vivienda'             => $request->get('tipoVivienda'),
            'tenencia'                  => $request->get('tenencia'),
            'tiempo_permanencia'        => $request->get('tiempoPermanencia'),
            'propietario'               => $request->get('infoPropietario'),
            'fotografia'                => $request->get('fotografia'),//
            'estado_general'            => $request->get('estadoGeneral'),
            'acabados'                  => $request->get('acabados'),
            'dotacion'                  => $request->get('dotacion'),
            'salubridad'                => $request->get('salubridad'),
            'estrato'                   => $request->get('estrato'),
            'servicios_publicos'        => $request->get('serviciosPublicos'),
            'distribucion_vivienda'     => $request->get('distribucion'),//
            'ciudad'                    => $request->get('ciudad'),
            'barrio'                    => $request->get('barrio'),
            'localidad'                 => $request->get('localidad'),
            'vias_acceso'               => $request->get('viasAcceso'),
            'transporte_publico'        => $request->get('transportePublico'),
            'centros_asistenciales'     => $request->get('centrosAsistenciales'),
            'flujo_vehicular'           => $request->get('flujoVehicular'),
            'nivel_seguridad'           => $request->get('nivelSeguridad'),
        ];
    }
}

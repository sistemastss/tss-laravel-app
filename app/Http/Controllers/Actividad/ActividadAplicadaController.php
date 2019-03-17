<?php

namespace App\Http\Controllers\Actividad;

use App\ActividadAplicada;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\ActividadAplicadaResource;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ActividadAplicadaController extends ApiController
{

    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $records = $servicioEsp->actividadAplicada()->get();
        if ($records->count() == 0) {
            Helper::throwModelNotFoud(ActividadAplicada::class);
        }
        $data = ActividadAplicadaResource::collection($records);
        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request$request, $servicio)
    {

        $values = array_map(
            function ($value) {return ['actividad_codigo' => $value['actividadCodigo']];},
            $request->get('actividades')
        );


        if (!$values || count($values) == 0) {
            return $this->showError('not params', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        $record = ActividadAplicada::insert($values);
        $data = new ActividadAplicadaResource($record);
        return $this->showOne($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function show(ServicioEsp $servicioEsp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function edit(ServicioEsp $servicioEsp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $servicioEsp)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicioEsp $servicioEsp)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Actividad;

use App\ActividadAplicada;
use App\ActividadAsignada;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ActividadAsignadaResource;
use App\Http\Resources\ActividadAplicadaResource;
use Illuminate\Http\Request;
use App\Exceptions\ModelHasOneRecordExeption;

class ActividadAsignadaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ActividadAplicada $actividadAplicada)
    {
        $record = $actividadAplicada->actividadAsignada()->firstOrFail();
        $data = new ActividadAsignadaResource($record);
        return $this->showOne($data, 201);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ActividadAplicada $actividadAplicada
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ActividadAplicada $actividadAplicada)
    {
        if ($actividadAplicada->actividadAsignada()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $rules = [
            'usuarioId' => 'required|numeric',
            'estado'    => 'required|string',
        ];

        $this->validate($request, $rules);

        $value = [
            'usuario_id' => $request->get('usuarioId'),
            'estado'     => $request->get('estado')
        ];

        $actividadAplicada->update(['estado' => $request->get('estado')]);
        $record = $actividadAplicada->actividadAsignada()->create($value);
        $data = new ActividadAsignadaResource($record);
        return $this->showOne($data, 201);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActividadAsignada  $actividadAsignada
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActividadAsignada $actividadAsignada)
    {
        //




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActividadAsignada  $actividadAsignada
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActividadAsignada $actividadAsignada)
    {
        //
    }
}

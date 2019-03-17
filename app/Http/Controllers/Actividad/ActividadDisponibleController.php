<?php

namespace App\Http\Controllers\Actividad;

use App\ActividadDisponible;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ActividadDisponibleResource;
use App\Http\Resources\ActividadAplicadaResource;
use Illuminate\Http\Request;

class ActividadDisponibleController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ActividadDisponible $actividadDisponible
     * @return \Illuminate\Http\Response
     */
    public function index(ActividadDisponible $actividadDisponible)
    {
        $records = $actividadDisponible->all();
        $data = ActividadDisponibleResource::collection($records);
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ActividadDisponible  $actividadDisponible
     * @return \Illuminate\Http\Response
     */
    public function show(ActividadDisponible $actividadDisponible)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ActividadDisponible  $actividadDisponible
     * @return \Illuminate\Http\Response
     */
    public function edit(ActividadDisponible $actividadDisponible)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActividadDisponible  $actividadDisponible
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ActividadDisponible $actividadDisponible)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ActividadDisponible  $actividadDisponible
     * @return \Illuminate\Http\Response
     */
    public function destroy(ActividadDisponible $actividadDisponible)
    {
        //
    }
}

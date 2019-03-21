<?php

namespace App\Http\Controllers;

use App\Http\Resources\ServicioResource;
use App\Investigacion;
use App\ServicioEsp;
use App\Servicio;
use Illuminate\Http\Request;

class ServicioController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp, Investigacion $investigaciones)
    {
        $esp = $servicioEsp->all();
        $inv = $investigaciones->all();

        $espCollect = ServicioResource::collection($esp);
        $invCollect = ServicioResource::collection($inv);

        $data1 = collect($espCollect);
        $data2 = collect($invCollect);

        $values = $data1->merge($data2);
        return $this->showAll($values);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Servicio  $servicios
     * @return \Illuminate\Http\Response
     */
    public function show(Servicio $servicios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Servicio  $servicios
     * @return \Illuminate\Http\Response
     */
    public function edit(Servicio $servicios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Servicio  $servicios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Servicio $servicios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Servicio  $servicios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Servicio $servicios)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\ServicioEsp;
use App\VisitaDomiciliaria;
use Illuminate\Http\Request;

class VisitaDomiciliariaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        //

        $verificacionDocumental = $servicioEsp->verificacionDocumental;
        $estadoSalubridad = $servicioEsp->estadoSalubridad;
        $nucleoFamiliar = $servicioEsp->nucleoFamiliar;
        $entornoHabitacional = $servicioEsp->entornoHabitacional;
        $modusVivendi = $servicioEsp->modusVivendi;

        if ($verificacionDocumental && $estadoSalubridad && $nucleoFamiliar && $modusVivendi) {
            $verificacionDocumental->update(['estado' => 'completado']);
            $estadoSalubridad->update(['estado' => 'completado']);
            $nucleoFamiliar->update(['estado' => 'completado']);
            $entornoHabitacional->update(['estado' => 'completado']);
            $modusVivendi->update(['estado' => 'completado']);

            return $this->showOne(['estado' => 'completado']);
        }


        return $this->showOne(['estado' => 'proceso']);
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
     * @param  \App\VisitaDomiciliaria  $visitaDomiciliaria
     * @return \Illuminate\Http\Response
     */
    public function show(VisitaDomiciliaria $visitaDomiciliaria)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VisitaDomiciliaria  $visitaDomiciliaria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $servicioEsp = ServicioEsp::where('id', $id)->first();

        $verificacionDocumental = $servicioEsp->verificacionDocumental;
        $estadoSalubridad = $servicioEsp->estadoSalubridad;
        $nucleoFamiliar = $servicioEsp->nucleoFamiliar;
        $entornoHabitacional = $servicioEsp->entornoHabitacional;
        $modusVivendi = $servicioEsp->modusVivendi;


        $verificacionDocumental->update('estado', 'notificado');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VisitaDomiciliaria  $visitaDomiciliaria
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisitaDomiciliaria $visitaDomiciliaria)
    {
        //
    }
}

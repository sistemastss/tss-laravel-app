<?php

namespace App\Http\Controllers;

use App\ActividadAplicada;
use App\Http\Resources\ActividadAplicadaResource;
use App\ServicioEsp;
use Illuminate\Http\Request;

class ActividadesController extends ApiController
{
    /**
     * Display the specified resource.
     *
     * @param  \App\ActividadAplicada  $actividadAplicada
     * @return \Illuminate\Http\Response
     */
    public function show(ActividadAplicada $actividadAplicada)
    {
        $actividad = new ActividadAplicadaResource($actividadAplicada);
        return $this->showOne($actividad);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ActividadAplicada  $actividadAplicada
     * @return \Illuminate\Http\Response
     * @throws 
     */
    public function update(Request $request, ActividadAplicada $actividadAplicada)
    {
        $rules = [
            'estado' => 'required|string'
        ];

        $this->validate($request, $rules);

        $actividadAplicada->estado = $request->get('estado');
        $actividadAplicada->save();


        $servicioEsp = $actividadAplicada->servicioEsp;
        $servicioEspActividades = $servicioEsp->actividadAplicada;
        $numeroActividadesAsignadas = $servicioEspActividades->count();

        // checkar si existen actividades con estado actualizado
        $validator = 0;
        $completed = 0;

        foreach ($servicioEspActividades as $actividad) {
            if ($actividad->estado != "cargado") {
                if ($actividad->estado == 'notificado') {
                    $completed++;
                }
                $validator ++;
            }
        }

        if ($validator > 0) {
            $servicioEsp->estado = 'proceso';
        }
        if ($completed == $numeroActividadesAsignadas) {
            $servicioEsp->estado = 'completado';
        }

        $servicioEsp->save();

        $actividad = new ActividadAplicadaResource($actividadAplicada);
        return $this->showOne($actividad);
    }

}

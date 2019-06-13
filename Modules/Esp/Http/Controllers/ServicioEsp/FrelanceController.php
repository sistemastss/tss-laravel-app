<?php

namespace App\Http\Controllers\Esp\ServicioEsp;

use App\ActividadAplicada;
use App\ActividadAsignada;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ActividadAplicadaResource;
use App\Http\Resources\ServicioEspResource;
use App\ServicioEsp;
use App\Usuario;
use Illuminate\Http\Request;

class FrelanceController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param $freelance
     * @return \Illuminate\Http\Response
     */
    public function index(Usuario $freelance)
    {
        //
        if (!$freelance->centroCosto) {
            return $this->showError('No tiene servicios creados', 422);
        }

        $freelanceId = $freelance->id;


        $serviciosEspDp = ActividadAsignada::where('usuario_id', $freelanceId)->get()->map(
            function (ActividadAsignada $actividadAsignada) {
                return $actividadAsignada->actividadAplicada->servicioEsp;
            }
        );

        $serviciosEsp = $serviciosEspDp->unique();

        $serviciosEspCollection = ServicioEspResource::collection($serviciosEsp);

        return $this->showAll($serviciosEspCollection);
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
     * @param  \App\Usuario  $usuario
     * @param $freelance
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $freelance, ServicioEsp $serviciosEsp)
    {
        //
        $usuarioId = $freelance->id;


        $actividades = $serviciosEsp->actividadAplicada->filter(
            function (ActividadAplicada $actividadAplicada) use ($usuarioId) {
                if ($actividadAplicada->actividadAsignada) {
                    //dd($actividadAplicada->actividadAsignada);
                    if ($actividadAplicada->actividadAsignada->usuario_id == $usuarioId) {
                        return $actividadAplicada;
                    }
                }
            }
        );

        return $this->showAll(ActividadAplicadaResource::collection($actividades));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}

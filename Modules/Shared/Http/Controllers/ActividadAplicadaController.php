<?php

namespace Modules\Shared\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Esp\Entities\Esp;
use Modules\Shared\Entities\ActividadAplicada;
use Modules\Shared\Transformers\ActividadAplicadaResource;

class ActividadAplicadaController extends Controller
{

    public function fromEsp($espId) {
        /** @var Esp $esp */
        $esp = Esp::find($espId);
        $records = $esp->actividades()->get();
        $data = ActividadAplicadaResource::collection($records);

        return $this->showAll($data);
    }

    /**
     * @param Esp $esp
     * @param array $payload
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function store(Esp $esp, array $payload) {

        foreach ($payload as $item)
        {
            $data = self::validateData($item);
            $esp->actividades()->create($data);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  ActividadAplicada $actividadAplicada
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

    /**
     * @param $payload
     * @throws \Illuminate\Validation\ValidationException
     * @return
     */
    private static function validateData($payload)
    {
        $rules  = ['actividad_id' => 'required'];
        Helper::validator($payload, $rules);

        return $payload;
    }

}

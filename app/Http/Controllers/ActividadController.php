<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Http\Resources\ActividadAplicadaResource;
use App\Http\Resources\ActividadResource;
use App\Models\Actividad;
use App\Models\ActividadAplicada;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function index() {
        $records = Actividad::all();
        if ($records->count() == 0) {
            Helper::throwModelNotFoud(Actividad::class);
        }
        $data = ActividadResource::collection($records);
        return $data;
    }

    public function show(ActividadAplicada $actividadAplicada)
    {
        $actividad = new ActividadAplicadaResource($actividadAplicada);
        return $this->showOne($actividad);
    }


    public function update(Request $request, $id)
    {
        $rules = [
            'estado' => 'required|string'
        ];

        $this->validate($request, $rules);

        $actividadAplicada = ActividadAplicada::find($id);
        $actividadAplicada->estado = $request->get('estado');
        $actividadAplicada->save();


        /**$servicioEsp = $actividadAplicada->esp;
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

        $servicioEsp->save();*/

        $actividad = new ActividadAplicadaResource($actividadAplicada);
        return $this->showOne($actividad);
    }

}

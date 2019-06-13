<?php

namespace Modules\Esp\Http\Controllers;

use App\Helpers\File;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Modules\Esp\Entities\Esp;
use Modules\Esp\Transformers\EspResource;
use Modules\Shared\Entities\CentroCosto;
use Modules\Shared\Http\Controllers\ActividadAplicadaController;
use Modules\Shared\Http\Controllers\CentroCostoController;
use Modules\Shared\Http\Controllers\EvaluadoController;

class EspController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Esp $esp)
    {
        $records = $esp->orderBy('id', 'DESC')->get();
        $data = EspResource::collection($records);
        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CentroCosto $centroCosto
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request)
    {
        $centroCosto = CentroCostoController::store($request->get('centro_costo'));

        foreach ($request->get('esps') as $item)
        {

            $data = $this->validateData($item);

            if ($item['anexo'])
            {

                $anexo = $item['anexo'];
                $anexo = File::uploadFile($anexo);
                $data['anexo'] = $anexo;

            }

            $data['analista'] = 2;

            $esp = $centroCosto->esp()->create($data);
            EvaluadoController::store($esp, $item['evaluado']);
            ActividadAplicadaController::store($esp, $item['actividades']);
        }

        return $this->created();
    }

    /**
     * Display the specified resource.
     *
     * @param  Esp $esp
     * @return \Illuminate\Http\Response
     */
    public function show(Esp $esp)
    {
        $data = new EspResource($esp);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Esp $esp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, Esp $esp)
    {
        $value = ['estado', $request->get('estado')];
        $esp->update($value);
        return $this->updated();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Esp $servicioEsp)
    {
        $servicioEsp->active = false;
        $isDeleted = $servicioEsp->save();

        if ($isDeleted) {
            return $this->deleted();
        }
    }


    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateData($payload) {
        $rules = [
            //'analista'          => 'required|integer',
            'tipo_esp'          => 'required|string',
            'lugar_desarrollo'  => 'required|string',
            'observaciones'     => 'required|string',
        ];

        Helper::validator($payload, $rules);

        $data = [
            //'analista'          => $payload['analista'],
            'tipo_esp'          => $payload['tipo_esp'],
            'lugar_desarrollo'  => $payload['lugar_desarrollo'],
            'observaciones'     => $payload['observaciones'],
        ];

        if (Arr::exists($payload, 'anexo')) {
            $data['anexo'] = $payload['anexo'];
        }

        return $data;
    }
}

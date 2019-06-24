<?php

namespace App\Http\Controllers\Esp;

use App\Helpers\File;
use App\Helpers\Helper;
use App\Http\Controllers\ActividadAplicadaController;
use App\Http\Controllers\CentroCostoController;
use App\Http\Controllers\EvaluadoController;
use App\Http\Resources\Esp\EspResource;
use App\Models\Esp\Esp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

class EspController extends Controller
{

    /**
     * @param Request $request
     * @param Esp $esp
     * @return
     */
    public function index(Esp $esp)
    {
        $records = $esp->orderBy('id', 'DESC')->get();
        $data = EspResource::collection($records);
        return $data;
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
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
     * @param $id
     * @return EspResource
     */
    public function show($id)
    {
        $esp = Esp::find($id);
        $data = new EspResource($esp);
        return $data;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Esp $esp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, $id)
    {
        $value = ['estado', $request->get('estado')];
        $esp = Esp::find($id);
        $esp->update($value);
        return $this->updated();
    }


    public function destroy(Esp $servicioEsp)
    {
        $servicioEsp->active = false;
        $isDeleted = $servicioEsp->save();

        if ($isDeleted) {
            return $this->deleted();
        }
    }

    /**
     * @param $payload
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

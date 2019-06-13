<?php

namespace App\Http\Controllers\Esp\ServicioEsp;

use App\CentroCosto;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\ServicioEspResource;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class ServicioEspController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, ServicioEsp $servicioEsp)
    {
        $records = $servicioEsp->orderBy('id', 'DESC')->get();
        $data = ServicioEspResource::collection($records);
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
        $data = $request->all();

        /** @var $centroCosto CentroCosto*/
        $centroCosto = CentroCosto::create($data['centro_costo']);

        foreach ($data['esps'] as $item) {

            // save file
            if (is_array($item['anexo'])) {
                $time = time();
                $anexo = $item['anexo'];
                [$name, $blob] = $anexo;
                $fileName = "{$name}_{$time}.doc";

                $file = [
                    'content' => Helper::fileFromBlob($blob),
                    'path' => 'public/files/',
                    'name' => $fileName
                ];

                Helper::saveFileUploaded($file);

                $item['anexo'] = $fileName;
            }

            /** @var $esp ServicioEsp */
            $esp = $centroCosto->servicioEsp()->create($item);
            $this->crearActividades($esp);
            $esp->personaEvaluada()->create($item['persona_evaluada']);
        }

        return $this->showMessage('Servicios creados con exito', Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function show(ServicioEsp $servicioEsp)
    {
        $data = new ServicioEspResource($servicioEsp);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp)
    {
        $value = ['estado', $request->get('estado')];
        $servicioEsp->update($value);
        return $this->showOne(new ServicioEspResource($servicioEsp));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServicioEsp $servicioEsp)
    {
        $servicioEsp->active = false;
        $isDeleted = $servicioEsp->save();

        if ($isDeleted) {
            return $this->showMessage(Helper::RECORD_DELETED, Response::HTTP_ACCEPTED);
        }
    }

    /**
     * @param ServicioEsp $esp
     */
    private function crearActividades(ServicioEsp $esp) {

        $actividades = ServicioEsp::getActividades($esp->tipo_esp);

        if (count($actividades) == 0) {
            return;
        }

        foreach ($actividades as $actividad) {
            $esp->actividades()->create(['actividad_codigo' => $actividad]);
        }

    }


    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function transformResponse(Request $request) {
        $values = $request->all();
        $data = [];
        $rules = [
            'evaluado'          => 'required|string',
            'tipoDocumento'     => 'required|string',
            'documento'         => 'required|numeric',
            'telefono'          => 'required|numeric',
            'email'             => 'required|email',
            'ciudad'            => 'required|string',
            'direccion'         => 'required|string',
            'observaciones'     => 'required|string',
            'tipoEsp'           => 'required|string',
            'aceptarTerminos'   => 'required|boolean',
        ];

        foreach ($values as $value) {
            Helper::validator($value, $rules);
            $data[] = [
                'evaluado'          => $value['evaluado'],
                'tipo_documento'    => $value['tipoDocumento'],
                'documento'         => $value['documento'],
                'telefono'          => $value['telefono'],
                'email'             => $value['email'],
                'ciudad'            => $value['ciudad'],
                'direccion'         => $value['direccion'],
                'observaciones'     => $value['observaciones'],
                'tipo_esp'          => $value['tipoEsp'],
                'aceptar_terminos'  => $value['aceptarTerminos'],
            ];
        }

        return $data;
    }
}

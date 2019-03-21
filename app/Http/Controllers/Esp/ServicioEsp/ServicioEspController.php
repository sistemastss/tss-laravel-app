<?php

namespace App\Http\Controllers\Esp\ServicioEsp;

use App\CentroCosto;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\ServicioEspResource;
use App\ServicioEsp;
use Illuminate\Foundation\Testing\HttpException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
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
        $records = $servicioEsp->active()->orderBy('id', 'DESC')->get();
        $data = ServicioEspResource::collection($records);
        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, CentroCosto $centroCosto)
    {
        $value = $this->transformResponse($request);

        foreach ($value as $item) {
            /** @var ServicioEsp $record */
            $record = $centroCosto->serviciosEsp()->create($item);
            $record->actividadAplicada()->createMany($item['actividades']);
        }
        return $this->showMessage('Esp guardados exitosamente', 201);
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
     * @param Request $request
     * @return array|null
     * @throws \Illuminate\Validation\ValidationException
     */
    private function transformResponse(Request $request) {
        $data = $request->all();
        $esp = [];

        $rules = [
            'ciudadDesarrollo'      => 'required|string',
            'nombre'                => 'required|string',
            'documento'             => 'required|numeric',
            'departamento'          => 'required|string',
            'ciudad'                => 'required|string',
            'telefono'              => 'required|numeric',
            'correo'                => 'required|email',
            'descripcion'           => 'required|string',
            'actividades'           => 'required'
        ];

        // validations
        foreach ($data as $value) {
            Helper::validator($value, $rules);
        }

        // transform data
        foreach ($data as $value) {
            $actividades = $value['actividades'];
            $filtro = [];
            foreach ($actividades as $key => $val) {
                if ($val) {
                    $filtro[] = ['actividad_codigo' =>  $key];
                }

            }

            $esp[] =  [
                'ciudad_desarrollo'     => $value['ciudadDesarrollo'],
                'nombre'                => $value['nombre'],
                'documento'             => $value['documento'],
                'departamento'          => $value['departamento'],
                'ciudad'                => $value['ciudad'],
                'telefono'              => $value['telefono'],
                'correo'                => $value['correo'],
                'descripcion'           => $value['descripcion'],
                'anexo'                 => $value['anexo'] ? $value['anexo'] : null,
                'actividades'           => $filtro
            ];
        }
        return $esp;
    }
}

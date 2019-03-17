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
        /**$codigos = [
            'historialJudicial'       => 'HJ',
            'visitaDomiciliaria'      => 'VDS',
            'verificacionLaboral'     => 'VL',
            'dueDilligence'           => 'DDL',
            'estudioFinanciero'       => 'EF',
            'verificacionAcademica'   => 'VA',
            'poligrafia'              => 'PL',
            'dicatamenGrafolofico'    => 'DG',
            'decadactilar'            => 'Dd',
            'pruebaPsicotecnica'      => 'PP',
        ];*/

        $value = $this->transformResponse($request);
        $centroCosto->serviciosEsp()->createMany($value);
        /** @var ServicioEsp $record */
        $record = ServicioEsp::create($value);
        $record->actividadAplicada()->createMany($value['actividades']);
        $record->refresh();
        $data = new ServicioEspResource($record);
        return $this->showOne($data);
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

        $rules = [
            // 'centroCostoId'         => 'required|numeric',
            'ciudadDesarrollo'      => 'required|string',
            'nombre'                => 'required|string', //$key['nombre'],
            'documento'             => 'required|numeric', //$key['documento'],
            'departamento'          => 'required|string', //$key['departamento'],
            'ciudad'                => 'required|string', //$key['ciudad'],
            'telefono'              => 'required|numeric', //$key['telefono'],
            'email'                 => 'required|email', //$key['correo'],
            'observaciones'         => 'required|string', //$key['observaciones'] || '',
            'actividades'           => 'required'
        ];

        $data = $request->all();
        foreach ($data as $value) {
            Helper::validator($value, $rules);
        }

        $esp = [];
        foreach ($data as $value) {
            $actividades = $value['actividades'];
            $filtro = [];
            foreach ($actividades as $actividad) {
                if (current($actividad)) {
                    $filtro[] = ['actividad_codigo' =>  key($actividad)];
                }
            }

            $esp[] =  [
                'ciudad_desarrollo'     => $value['ciudadDesarrollo'],
                'nombre'                => $value['nombre'],
                'documento'             => $value['documento'],
                'departamento'          => $value['departamento'],
                'ciudad'                => $value['ciudad'],
                'telefono'              => $value['telefono'],
                'email'                 => $value['email'],
                'observaciones'         => $value['observaciones'],
                'anexo'                 => $value['anexo'],
                'actividades'           => $filtro
            ];
        }

        /**$actividades = array_map(
            function ($value) {return ['actividad_codigo' => $value['actividadCodigo']];},
            $request->get('actividades')
        );*/

        /*$array =  [
            'centro_costo_id'       => $request->get('centroCostoId'),
            'ciudad_desarrollo'     => $request->get('ciudadDesarrollo'),
            'nombre'                => $request->get('nombre'),
            'documento'             => $request->get('documento'),
            'departamento'          => $request->get('departamento'),
            'ciudad'                => $request->get('ciudad'),
            'telefono'              => $request->get('telefono'),
            'email'                 => $request->get('email'),
            'observaciones'         => $request->get('observaciones'),
            'anexo'                 => $request->get('anexo'),
            'estado'                => Arr::exists($request->all(), 'estado') ? $request->get('estado') : null,
            'actividades'           => $actividades
        ];*/

        return $esp;
    }
}

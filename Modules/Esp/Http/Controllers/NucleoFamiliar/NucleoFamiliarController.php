<?php

namespace App\Http\Controllers\Esp\NucleoFamiliar;

use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Controllers\Helpers\NucleoFamiliarHelper;
use App\Http\Resources\NucleoFamiliar\NucleoFamiliarResource;
use App\InformacionFamiliar;
use App\NucleoFamiliar;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NucleoFamiliarController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\ServicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->nucleoFamiliar()->firstOrFail();
        $data = new NucleoFamiliarResource($record);
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        if ($servicioEsp->nucleoFamiliar()->exists()) {
            throw new ModelHasOneRecordExeption();
        }
        $value = $this->transformRequest($request);
        $record = $servicioEsp->nucleoFamiliar()->create($value);
        $record->refresh();
        $data = new NucleoFamiliarResource($record);
        return $this->showOne($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\InformacionFamiliar  $informacionFamiliar
     * @param  \App\ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function show(InformacionFamiliar $informacionFamiliar, ServicioEsp $servicioEsp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\NucleoFamiliar $nucleoFamiliar
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $nucleoFamiliar)
    {
        $value = $this->transformRequest($request);

        $record = $servicioEsp->nucleoFamiliar()->findOrFail($nucleoFamiliar);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $data = new NucleoFamiliarResource($record);
        return $this->showOne($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  NucleoFamiliar $nucleoFamiliar
     * @return \Illuminate\Http\Response
     */
    public function destroy(NucleoFamiliar $nucleoFamiliar)
    {
        //
    }


    /**
     * Transform the data of the request
     *
     * @param Request $request
     * @return array
     * @throws
     */
    private function transformRequest(Request $request)
    {
        $rules = [
            'nombre'            => 'required|string',
            'edad'              => 'required|numeric',
            'identificacion'    => 'required|numeric',
            'lugarExpedicion'   => 'required|string',
            'lugarNacimiento'   => 'required|string',
            'fechaNacimiento'   => 'required|date',
            'ocupacion'         => 'required|string',
            'empresa'           => 'required|string',
            'telefono'          => 'required|numeric',
            'tiempoLaborado'    => 'required|string',
            'fotografia'        => 'required',
            'observaciones'     => 'required|string',
        ];

        $this->validate($request, $rules);
        $flag = false;
        if ($request->has('fotografia')) {
            $flag = true;
            $data = $request->get('fotografia');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = time().'.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);
        }

        return [
            'nombre'                    => $request->get('nombre'),
            'edad'                      => $request->get('edad'),
            'numero_identificacion'     => $request->get('identificacion'),
            'lugar_expedicion'          => $request->get('lugarExpedicion'),
            'lugar_nacimiento'          => $request->get('lugarNacimiento'),
            'fecha_nacimiento'          => $request->get('fechaNacimiento'),
            'ocupacion'                 => $request->get('ocupacion'),
            'empresa'                   => $request->get('empresa'),
            'telefono'                  => $request->get('telefono'),
            'tiempo_laborado'           => $request->get('tiempoLaborado'),
            'fotografia'                => $flag ? $url : $request->get('fotografia'),
            'observaciones'             => $request->get('observaciones')
        ];
    }
}

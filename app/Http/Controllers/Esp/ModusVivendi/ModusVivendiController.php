<?php

namespace App\Http\Controllers\Esp\ModusVivendi;

use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ModusVivendi\ModusVivendiResource;
use App\ModusVivendi;
use App\ServicioEsp;
use Illuminate\Http\Request;

class ModusVivendiController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->modusVivendi()->firstOrFail();
        $data = new ModusVivendiResource($record);
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        if ($servicioEsp->modusVivendi()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $value = $this->transformRequest($request);
        $record = $servicioEsp->modusVivendi()->create($value);
        $record->refresh();
        $data = new ModusVivendiResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ServicioEsp $servicioEsp
     * @param  $modusVivendi
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $modusVivendi)
    {
        $value = $this->transformRequest($request);

        $record = $servicioEsp->modusVivendi()->findOrFail($modusVivendi);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $data = new ModusVivendiResource($record);
        return $this->showOne($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ModusVivendi  $modusVivendi
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModusVivendi $modusVivendi)
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     * @throws
     */
    public function transformRequest(Request $request)
    {
        $rules = [
            'salario'               => 'required|numeric',
            'otrosIngresos'         => 'required|numeric',
            'salarioConyugue'       => 'required|numeric',
            'engresosMensuales'     => 'required|numeric',
            'descripcionGastos'     => 'required|string',
            'personasDependientes'  => 'required|numeric',
            'analisisPatrimonial'   => 'required|string',
        ];

        $this->validate($request, $rules);

        return [
            'salario'                => $request->get('salario'),
            'otros_ingresos'         => $request->get('otrosIngresos'),
            'salario_conyuge'        => $request->get('salarioConyugue'),
            'egresos_mensuales'      => $request->get('engresosMensuales'),
            'descripcion_gastos'     => $request->get('descripcionGastos'),
            'personas_dependientes'  => $request->get('personasDependientes'),
            'analisis_patrimonial'   => $request->get('analisisPatrimonial'),
        ];
    }
}

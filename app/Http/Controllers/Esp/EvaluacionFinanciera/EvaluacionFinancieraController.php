<?php

namespace App\Http\Controllers\Esp\EvaluacionFinanciera;

use App\CuentaBancaria;
use App\EvaluacionFinanciera;
use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Resources\EvaluacionFinancieraResource;
use App\ObligacionExtinguida;
use App\ObligacionMora;
use App\ObligacionVigente;
use App\ObligacionVigenteReal;
use App\ServicioEsp;
use Illuminate\Http\Request;

class EvaluacionFinancieraController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param \App\ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->evaluacionFinanciera()->firstOrFail();
        $data = new EvaluacionFinancieraResource($record);
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

        /**$cuentasBancarias = $data['cuentas_bancarias'];
        $obligacionesVigentes = $data['obligaciones_vigentes'];
        $obligacionesVigentesReal = $data['obligaciones_vigentes_real'];
        $obligacionesMora = $data['obligaciones_mora'];
        $obligacionesExtinguidas = $data['obligaciones_mora'];

        EvaluacionFinanciera::create([
            'persona_evaluada_id' => $data['persona_evaluada_id'],
            'resumen_endeudamiento' => $data['resumen_endeudamiento'],
            'conclucion' => $data['conclucion']
        ]);

        if (isset($cuentasBancarias)) {
            foreach ($cuentasBancarias as $cuentaBancaria) {
                CuentaBancaria::create($cuentaBancaria);
            }
        }

        if (isset($obligacionesVigentes)) {
            foreach ($obligacionesVigentes as $obligacionVigente) {
                ObligacionVigente::create($obligacionVigente);
            }
        }

        if (isset($obligacionesVigentesReal)) {
            foreach ($obligacionesVigentesReal as $item) {
                ObligacionVigenteReal::create($item);
            }
        }

        if (isset($obligacionesMora)) {
            foreach ($obligacionesMora as $obgMora) {
                ObligacionMora::create($obgMora);
            }
        }

        if (isset($obligacionesExtinguidas)) {
            foreach ($obligacionesExtinguidas as $obgExtinguida) {
                ObligacionExtinguida::create($obgExtinguida);
            }
        }*/

        if ($servicioEsp->evaluacionFinanciera()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $value = $this->transformRequest($request);
        $record = $servicioEsp->evaluacionFinanciera()->create($value);
        $data = new EvaluacionFinancieraResource($record);
        return $this->showOne($data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ServicioEsp $servicioEsp
     * @param  \App\EvaluacionFinanciera  $evaluacionFinanciera
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp,  $evaluacionFinanciera)
    {
        $record = $servicioEsp->evaluacionFinanciera()->findOrFail($evaluacionFinanciera);
        $value = $this->transformRequest($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $data = new EvaluacionFinancieraResource($record);
        return $this->showOne($data);
    }


    public function transformRequest(Request $request) {
        return [
            'conclusion' => $request->get('conclusion'),
        ];
    }
}

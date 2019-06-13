<?php

namespace App\Http\Controllers\Esp\EvaluacionFinanciera;

use App\EvaluacionFinanciera;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\EvaluacionFinanciera\ObligacionVigenteRealResource;
use App\ObligacionVigenteReal;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ObligacionVigenteRealController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $records = $servicioEsp->obligacionesVigentesReal()->get();

        if ($records->count() == 0) {
            Helper::throwModelNotFoud(ObligacionVigenteReal::class);
        }

        $data = ObligacionVigenteRealResource::collection($records);
        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request,ServicioEsp $servicioEsp)
    {
        $value = $this->transformRequest($request);
        $record = $servicioEsp->obligacionesVigentesReal()->create($value);
        $data = new ObligacionVigenteRealResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ServicioEsp $servicioEsp
     * @param  $obligacionVigenteReal
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $obligacionVigenteReal)
    {
        $record = $servicioEsp->obligacionesVigentesReal()->findOrFail($obligacionVigenteReal);
        $value = $this->transformRequest($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();

        $data = new ObligacionVigenteRealResource($record);
        return $this->showOne($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  ServicioEsp $servicioEsp
     * @param $obligacionVigenteReal
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $obligacionVigenteReal)
    {;
        $record = $servicioEsp->obligacionesVigentesReal()->findOrFail($obligacionVigenteReal);
        $isDeleted = $record->delete();

        if ($isDeleted) {
            return $this->showMessage(Helper::RECORD_DELETED, Response::HTTP_ACCEPTED);
        }
    }


    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    public function transformRequest(Request $request) {
        $rules = [
            'entidad'           => 'required|string',
            'lineaCredito'      => 'required|string',
            'fechaApertura'     => 'required|date',
            'valorCargoFijo'    => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $value = [
            'entidad'           => $request->get('entidad'),
            'linea_credito'     => $request->get('lineaCredito'),
            'fecha_apertura'    => $request->get('fechaApertura'),
            'valor_cargo_fijo'  => $request->get('valorCargoFijo'),
        ];

        return $value;
    }
}

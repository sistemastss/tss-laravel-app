<?php

namespace App\Http\Controllers\Esp\Comun;

use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Requests\EspRequest;
use App\Http\Resources\ComunEspResource;
use App\ServicioEsp;

class PruebaPsicotecnicaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->pruebaPsicotecnica()->firstOrFail();
        $data = new ComunEspResource($record);
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EspRequest $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(EspRequest $request, ServicioEsp $servicioEsp)
    {
        if ($servicioEsp->pruebaPsicotecnica()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $record = $servicioEsp->pruebaPsicotecnica()->create($request->all());
        $data = new ComunEspResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EspRequest  $request
     * @param ServicioEsp $servicioEsp
     * @param $decaDactilar
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(EspRequest $request, ServicioEsp $servicioEsp, $decaDactilar)
    {
        $record = $servicioEsp->pruebaPsicotecnica()->findOrFail($decaDactilar);
        $record->fill($request->all());

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $data = new ComunEspResource($record);
        return $this->showOne($data);
    }
}

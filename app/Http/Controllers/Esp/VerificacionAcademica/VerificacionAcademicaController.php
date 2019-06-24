<?php

namespace App\Http\Controllers\Esp\VerificacionAcademica;

use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\VerificacionAcademica\VerificacionAcademicaResource;
use App\ServicioEsp;
use App\VerificacionAcademica;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Arr;

class VerificacionAcademicaController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $records = $servicioEsp->verificacionAcademica()->get();

        if ($records->count() == 0) {
            Helper::throwModelNotFoud(VerificacionAcademica::class);
        }

        $data = VerificacionAcademicaResource::collection($records);
        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        $value = $this->transformRequest($request);
        $records =$servicioEsp->verificacionAcademica()->create($value);
        $data = new VerificacionAcademicaResource($records);

        return $this->showAll($data, Response::HTTP_CREATED);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $verificacionAcademica
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $verificacionAcademica)
    {
        $record = $servicioEsp->verificacionAcademica()->findOrFail($verificacionAcademica);
        $value = $this->transformRequest($request);

        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $data = new VerificacionAcademicaResource($record);

        return $this->showAll($data, Response::HTTP_ACCEPTED);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param ServicioEsp $servicioEsp
     * @param  $verificacionAcademica
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(ServicioEsp $servicioEsp, $verificacionAcademica)
    {
        $record = $servicioEsp->verificacionAcademica()->findOrFail($verificacionAcademica);

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
    public function transformRequest(Request $request)
    {
        $rules = [
            'nivel'         => 'required',
            'institucion'   => 'required|string',
            'titulo'        => 'required|string',
            'anno'          => 'required|numeric',
            'ciudad'        => 'required|string',
            'confirmacion'  => 'required|boolean',
            'observacion'   => 'required|string',
        ];

        $this->validate($request, $rules);

        $value = [
            'nivel'         => $request->get('nivel'),
            'institucion'   => $request->get('institucion'),
            'titulo'        => $request->get('titulo'),
            'anno'          => $request->get('anno'),
            'ciudad'        => $request->get('ciudad'),
            'confirmacion'  => $request->get('confirmacion'),
            'observacion'   => $request->get('observacion'),
        ];

        return $value;
    }
}

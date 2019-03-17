<?php

namespace App\Http\Controllers\Investigaciones;

use App\CentroCosto;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\investigaciones\InvestigacionesResource;
use App\Investigaciones;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvestigacionesController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param Investigaciones $investigaciones
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Investigaciones $investigaciones)
    {
        $records = $investigaciones->all();

        if ($records->count() == 0) {
            Helper::throwModelNotFoud(Investigaciones::class);
        }
        $data = InvestigacionesResource::collection($records);
        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, $id)
    {
        $centroCosto = CentroCosto::find($id);
        $value = $this->transformRequest($request);
        $record = $centroCosto->investigaciones()->create($value);
        $data = new InvestigacionesResource($record);
        return $this->showOne($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Investigaciones  $investigaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Investigaciones $investigaciones)
    {
        $data = new InvestigacionesResource($investigaciones);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CentroCosto  $centroCosto
     * @param $investigacion
     * @throws
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CentroCosto $centroCosto, $investigacion)
    {
        $record = $centroCosto->investigaciones()->findOrFail($investigacion);
        $value = $this->transformRequest($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }
        $record->save();
        $data = new InvestigacionesResource($record);
        return $this->showOne($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Investigaciones  $investigaciones
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(CentroCosto $centroCosto, $investigaciones)
    {
        $record = $centroCosto->investigaciones()->findOrFail($investigaciones);
        $isDeleted = $record->delete();

        if ($isDeleted) {
            return $this->showMessage(Helper::RECORD_DELETED, Response::HTTP_ACCEPTED);
        }
    }

    /**
     * @param Request $request
     * @throws \Illuminate\Validation\ValidationException
     * @return array
     */
    public function transformRequest(Request $request) {
        $rules = [
            'ciudad' => 'required',
            'descripcion' => 'required',
        ];

        $this->validate($request, $rules);

        $data = [
            'ciudad' => $request->get('ciudad'),
            'descripcion' => $request->get('descripcion')
        ];

        if ($request->has('anexo')) {
            $data['anexo'] = $request->get('anexo');
        }

        return $data;
    }
}

<?php

namespace App\Http\Controllers\Investigaciones;

use App\CentroCosto;
use App\Classes\Message;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\investigaciones\InvestigacionesResource;
use App\Investigacion;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class InvestigacionesController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param Investigacion $investigaciones
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, Investigacion $investigaciones)
    {
        $records = $investigaciones->orderBy('id', 'DESC')->get();
        if ($records->count() == 0) {
            Helper::throwModelNotFoud(Investigacion::class);
        }
        $data = InvestigacionesResource::collection($records);
        return $this->showAll($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request  $request
     * @param CentroCosto $centroCosto
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, CentroCosto $centroCosto)
    {
        $values = $this->transformRequest($request);
        $centroCosto->investigacion()->createMany($values);
        return $this->showMessage(Message::dataCreated, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Investigacion  $investigaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Investigacion $investigaciones)
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
     * @param  \App\Investigacion  $investigaciones
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
        $values = $request->all();
        $data = [];
        $rules = [
            'ciudad' => 'required',
            'descripcion' => 'required',
        ];

        foreach ($values as $value) {
            Helper::validator($value, $rules);
            $data[] = [
                'ciudad'        => $value['ciudad'],
                //'anexo'         => $value['anexo'] ? $value['anexo'] : null,
                'descripcion'   => $value['descripcion'],
            ];
        }

        return $data;
    }
}

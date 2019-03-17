<?php

namespace App\Http\Controllers;

use App\CentroCosto;
use App\Http\Resources\CentroCostoResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Helpers\Helper;
use Illuminate\Support\Arr;

class CentroCostoController extends ApiController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request)
    {
        $value = $this->transformResponse($request);
        /** @var CentroCosto $record */
        $record = CentroCosto::create($value);

        if (Arr::exists($value, 'orden_compra')) {
           $record->ordenCompra()->create($value['orden_compra']);
        }

        $data = new CentroCostoResource($record);
        return $this->showOne($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CentroCosto  $centroCosto
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, CentroCosto $centroCosto)
    {
        $data = new CentroCostoResource($centroCosto);
        return $this->showOne($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CentroCosto  $centroCosto
     * @return \Illuminate\Http\Response
     */
    public function edit(CentroCosto $centroCosto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CentroCosto  $centroCosto
     * @return \Illuminate\Http\Response
     */
    public function update(CentroCosto $centroCosto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CentroCosto  $centroCosto
     * @return \Illuminate\Http\Response
     */
    public function destroy(CentroCosto $centroCosto)
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function transformResponse(Request $request) {
        $rules = [
            'clienteId'         => 'required',
            'solicitante'       => 'required',
            'correoSolicitante' => 'required',
        ];

       Helper::validator($request->all(), $rules);

        if ($request->has('numeroOrden') && $request->has('anexo')) {
            $array = [
                'numeroOrden'   => $request->get('numeroOrden'),
                'anexo'         => $request->get('anexo'),
            ];

            $rules = [
                'numeroOrden' => 'required|integer',
                'anexo'       => 'required',
            ];

            Helper::validator($array, $rules);

            return [
                'usuario_id'            => $request->get('clienteId'),
                'solicitante'           => $request->get('solicitante'),
                'correo_solicitante'      => $request->get('correoSolicitante'),
                'orden_compra'          => [
                    'numero_orden_compra'   => $request->get('numeroOrden'),
                    'anexo'                 => $request->get('anexo'),
                ]
            ];

        }

        return [
            'usuario_id'            => $request->get('clienteId'),
            'solicitante'           => $request->get('solicitante'),
            'correo_solicitante'      => $request->get('correoSolicitante'),
        ];
    }
}

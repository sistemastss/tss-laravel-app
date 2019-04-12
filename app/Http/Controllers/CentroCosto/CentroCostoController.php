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
    public function store(Request $request, CentroCosto $centroCosto)
    {
        $value = $this->transformResponse($request);

        /** @var CentroCosto $record */
        $record = CentroCosto::create($value);

        if (Arr::exists($value, 'orden_compra')) {
            $time = time();
            $ordenCompra = $value['orden_compra'];
            $anexo = $ordenCompra['anexo'];
            [$name, $blob] = $anexo;
            $fileName = "{$name}_{$time}.doc";

            $file = [
                'content' => Helper::fileFromBlob($blob),
                'path' => 'public/files/',
                'name' => $fileName
            ];

            Helper::saveFileUploaded($file);

            $ordenCompra = [
                'numero_orden_compra' => $value['orden_compra'],
                'anexo' => $fileName
            ];

            $record->ordenCompra()->create($ordenCompra);
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
            'clienteId'             => 'required|integer',
            'solicitante'           => 'required|string',
            'telefonoSolicitante'   => 'required|integer',
            'emailSolicitante'      => 'required|string',
            'destinoFactura'        => 'required|string',
            'tipoSociedad'          => 'required|string',
            'tipoIdentificacion'    => 'required|string',
            'numeroIdentificacion'  => 'required|integer',
            'telefonoFactura'       => 'required|integer',
            'emailFactura'          => 'required|string',
        ];

        Helper::validator($request->all(), $rules);

        $data = [
            'usuario_id'            => $request->get('clienteId'),
            'solicitante'           => $request->get('solicitante'),
            'telefono_solicitante'  => $request->get('telefonoSolicitante'),
            'email_solicitante'     => $request->get('emailSolicitante'),
            'destino_factura'       => $request->get('destinoFactura'),
            'tipo_sociedad'         => $request->get('tipoSociedad'),
            'tipo_identificacion'   => $request->get('tipoIdentificacion'),
            'numero_identificacion' => $request->get('numeroIdentificacion'),
            'telefono_factura'      => $request->get('telefonoFactura'),
            'email_factura'         => $request->get('emailFactura'),
        ];

        if ($request->has('numeroOrden') && $request->has('anexo')) {
            $values = [
                'numeroOrden'   => $request->get('numeroOrden'),
                'anexo'         => $request->get('anexo'),
            ];

            $rules = [
                'numeroOrden' => 'required|integer',
                'anexo'       => 'required',
            ];

            Helper::validator($values, $rules);

            $data['orden_compra'] = [
                'numero_orden_compra'   => $request->get('numeroOrden'),
                'anexo'                 => $request->get('anexo'),
            ];
        }
        return $data;
    }
}

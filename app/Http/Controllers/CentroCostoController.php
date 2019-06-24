<?php

namespace App\Http\Controllers;

use App\Models\CentroCosto;
use \App\Helpers\Helper;
use Illuminate\Support\Arr;

class CentroCostoController
{
    /**
     * @param $payload
     * @return mixed
     * @throws \Illuminate\Validation\ValidationException
     */
    public static function store($payload)
    {
        $data = self::validateData($payload);

        $record = CentroCosto::create($data);

        $ordenCompra = [];

        if (Arr::exists($payload, 'numero_orden'))
        {
            $ordenCompra['numero_orden'] = $payload['numero_orden'];
        }

        if (Arr::exists($payload, 'anexo'))
        {
            $ordenCompra['anexo'] = $payload['anexo'];
        }

        if (count($ordenCompra) > 0)
        {
            OrdenCompraController::store($record, $ordenCompra);
        }


        return $record;
    }

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
     * @param array $payload
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private static function validateData(array $payload) {
        $rules = [
            'cliente_id'            => 'required|numeric',
            'solicitante'           => 'required|string',
            'tipo_documento'        => 'required|string',
            'documento'             => 'required|numeric',
            'email_solicitante'     => 'required|email',
            'telefono_solicitante'  => 'required|numeric',
            'tipo_sociedad'         => 'required|string',
            'destino_factura'       => 'required|string',
            'email_factura'         => 'required|email',
            'telefono_factura'      => 'required|numeric',
        ];

        Helper::validator($payload, $rules);

        return [
            'cliente_id'            => $payload['cliente_id'],
            'solicitante'           => $payload['solicitante'],
            'destino_factura'       => $payload['destino_factura'],
            'email_factura'         => $payload['email_factura'],
            'email_solicitante'     => $payload['email_solicitante'],
            'tipo_documento'        => $payload['tipo_documento'],
            'documento'             => $payload['documento'],
            'telefono_factura'      => $payload['telefono_factura'],
            'telefono_solicitante'  => $payload['telefono_solicitante'],
            'tipo_sociedad'         => $payload['tipo_sociedad'],
        ];
    }
}


<?php

namespace Modules\Shared\Http\Controllers;

use App\Helpers\File;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Modules\Shared\Entities\CentroCosto;

class OrdenCompraController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  CentroCosto $centroCosto, array $payload
     * @return
     * @throws
     */
    public static function store(CentroCosto $centroCosto, array $payload)
    {
        $data = self::validateData($payload);

        if (Arr::exists($data, 'anexo'))
        {
            $anexo = $data['anexo'];
            $fileName = File::uploadFile($anexo);

            $data['anexo'] = $fileName;
        }

        return $centroCosto->ordenCompra()->create($data);
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
     * @param array $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private static function validateData(array $payload) {

        $rules = [
            'numero_orden'  => 'required|integer',
        ];

        Helper::validator($payload, $rules);

        return $payload;
    }
}

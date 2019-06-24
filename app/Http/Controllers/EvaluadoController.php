<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Esp\Esp;
use Illuminate\Http\Request;

class EvaluadoController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return
     * @throws
     */
    public static function store(Esp $esp, $payload)
    {
        $data = self::validateData($payload);
        return $esp->evaluado()->create($data);

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
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private static function validateData(array $payload) {
        $rules = [
            'evaluado'          => 'required|string',
            'cargo'             => 'required|string',
            'tipo_documento'    => 'required|string',
            'documento'         => 'required|numeric',
            'telefono'          => 'required|numeric',
            'email'             => 'required|email',
        ];

        Helper::validator($payload, $rules);

        return $payload;
    }
}

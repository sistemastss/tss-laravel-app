<?php

namespace App\Http\Controllers;

use App\CentroCosto;
use App\Http\Controllers\Helpers\Helper;
use App\Http\Resources\PoligrafiaResource;
use App\Poligrafia;
use App\Classes\Message;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PoligrafiaController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param Poligrafia $poligrafia
     * @return \Illuminate\Http\Response
     */
    public function index(Poligrafia $poligrafia)
    {
        $value = $poligrafia->orderBy('id', 'DESC')->get();
        $data = PoligrafiaResource::collection($value);
        return $this->showAll($data, 200);
    }

    /**
     * @param Request $request
     * @param CentroCosto $centroCosto
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, CentroCosto $centroCosto)
    {
        $values = $this->transformResponse($request);
        $centroCosto->poligrafia()->createMany($values);
        return $this->showMessage(Message::dataCreated, Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poligrafia  $poligrafia
     * @return \Illuminate\Http\Response
     */
    public function show(Poligrafia $poligrafia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poligrafia  $poligrafia
     * @return \Illuminate\Http\Response
     */
    public function edit(Poligrafia $poligrafia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poligrafia  $poligrafia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poligrafia $poligrafia)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poligrafia  $poligrafia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poligrafia $poligrafia)
    {
        //
    }

    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function transformResponse(Request $request) {
        $values = $request->all();
        $data = [];
        $rules = [
            'evaluado'          => 'required|string',
            'tipoDocumento'     => 'required|string',
            'documento'         => 'required|numeric',
            'departamento'      => 'required|string',
            'ciudad'            => 'required|string',
            'telefono'          => 'required|numeric',
            'email'             => 'required|email',
            'contexto'          => 'required|string',
            'tipoPoligrafia'    => 'required|string',
        ];

        foreach ($values as $value) {
            Helper::validator($value, $rules);
            $data[] = [
                'evaluado'          => $value['evaluado'],
                'tipo_documento'    => $value['tipoDocumento'],
                'documento'         => $value['documento'],
                'departamento'      => $value['departamento'],
                'ciudad'            => $value['ciudad'],
                'telefono'          => $value['telefono'],
                'email'             => $value['email'],
                'contexto'          => $value['contexto'],
                'tipo_poligrafia'   => $value['tipoPoligrafia']
            ];
        }

        return $data;
    }
}

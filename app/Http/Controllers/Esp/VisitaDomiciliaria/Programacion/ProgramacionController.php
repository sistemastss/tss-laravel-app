<?php

namespace App\Http\Controllers\Esp\VisitaDomiciliaria\Programacion;

use App\Http\Controllers\Controller;
use App\Models\Esp\VisitaDomiciliaria\Programacion\Programacion;
use App\Models\Esp\VisitaDomiciliaria\VisitaDomiciliaria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProgramacionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {
        $vsd = VisitaDomiciliaria::find($id);
        return $vsd->programacion()->firstOrFail();
    }

    /**
     * @param Request $request
     * @param $id
     * @return Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $id)
    {
        $rules = [
            'fecha' => 'required',
            'hora'  => 'required',
        ];

        $this->validate($request, $rules);
        
        $vsd = VisitaDomiciliaria::find($id);
        $record = $vsd->programacion()->create($request->all());

        return $record;
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws
     */
    public function update(Request $request, $id)
    {
        //
        $rules = [
            'fecha' => 'required',
            'hora' => 'required',
            'justificacion_reprog' => 'required',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['fecha_reprogramacion'] = time();
        $programacion = Programacion::find($id);
        $programacion->update($data);

        return $this->updated();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}

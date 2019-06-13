<?php

namespace Modules\Esp\Http\Controllers\VisitaDomiciliaria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Esp\Entities\VisitaDomiciliaria\Programacion\Programacion;
use Modules\Esp\Entities\VisitaDomiciliaria\VisitaDomiciliaria;

class ProgramacionController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(VisitaDomiciliaria $vsd)
    {
        return $vsd->programacion()->firstOrFail();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     * @throws
     */
    public function store(Request $request, VisitaDomiciliaria $vsd)
    {
        $rules = [
            'fecha' => 'required',
            'hora'  => 'required',
        ];

        $this->validate($request, $rules);

        $record = $vsd->programacion()->create($request->all());

        return $this->showOne($record);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     * @throws
     */
    public function update(Request $request, Programacion $programacion)
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

        $programacion->update($data);
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

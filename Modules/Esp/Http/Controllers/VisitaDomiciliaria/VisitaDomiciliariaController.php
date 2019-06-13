<?php

namespace Modules\Esp\Http\Controllers\VisitaDomiciliaria;

use App\Helpers\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Modules\Esp\Entities\Esp;
use Modules\Esp\Entities\VisitaDomiciliaria\VisitaDomiciliaria;
use Modules\Esp\Transformers\EspResource;
use Modules\Shared\Entities\CentroCosto;

class VisitaDomiciliariaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Esp $esp)
    {
        $data = $esp->visitaDomiciliaria()->firstOrFail();
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CentroCosto $centroCosto
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, Esp $esp)
    {
        $rules = ['usuario_id' => 'required|integer'];
        $this->validate($request, $rules);

        $esp->visitaDomiciliaria()->create($request->all());

        return $this->created();
    }

    /**
     * Display the specified resource.
     *
     * @param  Esp $esp
     * @return \Illuminate\Http\Response
     */
    public function show(Esp $esp)
    {
        $data = new EspResource($esp);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Esp $esp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function reject(Request $request, VisitaDomiciliaria $visitaDomiciliaria)
    {
        $rules = ['justificacion_rechazo' => 'required|string'];
        $this->validate($request, $rules);
        $visitaDomiciliaria->update($request->all());

        return $this->updated();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(VisitaDomiciliaria $visitaDomiciliaria)
    {
        $isDeleted = $visitaDomiciliaria->delete();

        if ($isDeleted) {
            return $this->deleted();
        }
    }
}

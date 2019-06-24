<?php

namespace App\Http\Controllers\Esp\VisitaDomiciliaria;

use App\Http\Resources\Esp\EspResource;
use App\Models\Esp\Esp;
use App\Models\Esp\VisitaDomiciliaria\VisitaDomiciliaria;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class VisitaDomiciliariaController extends Controller
{
    /**
     * @param Esp $esp
     * @return
     */
    public function index($id)
    {
        $esp = Esp::find($id);
        $data = $esp->visitaDomiciliaria()->firstOrFail();
        return $data;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, $id)
    {
        $rules = ['freelance_id' => 'required|integer'];
        $this->validate($request, $rules);

        $esp = Esp::find($id);
        $esp->visitaDomiciliaria()->create($request->all());

        return $this->created();
    }

    /**
     * @param $id
     * @return EspResource
     */
    public function show($id)
    {
        $esp = Esp::find($id);
        $data = new EspResource($esp);
        return $data;
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function reject(Request $request, $id)
    {
        $rules = ['justificacion_rechazo' => 'required|string'];
        $this->validate($request, $rules);

        $vsd = VisitaDomiciliaria::find($id);
        $vsd->update($request->all());

        return $this->updated();
    }

    public function destroy($id)
    {
        $vsd = VisitaDomiciliaria::find($id);
        $isDeleted = $vsd->delete();

        if ($isDeleted) {
            return $this->deleted();
        }
    }
}

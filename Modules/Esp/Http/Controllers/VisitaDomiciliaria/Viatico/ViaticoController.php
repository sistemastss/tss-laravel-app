<?php

namespace Modules\Esp\Http\Controllers\VisitaDomiciliaria;

use App\Helpers\Helper;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Esp\Entities\VisitaDomiciliaria\Programacion\Programacion;
use Modules\Esp\Entities\VisitaDomiciliaria\Viatico\Viatico;
use Modules\Esp\Entities\VisitaDomiciliaria\VisitaDomiciliaria;

class ViaticoController extends \App\Http\Controllers\Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index(VisitaDomiciliaria $vsd)
    {
        $records = $vsd->viatico()->get();

        if ($records->count() == 0) {
            Helper::throwModelNotFoud(Viatico::class);
        }

        return $this->showAll($records);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     * @throws
     */
    public function store(Request $request,$id)
    {
        $rules = [
            'origen'    => 'required|string',
            'destino'   => 'required|string',
            'cantidad'  => 'required|numeric',
        ];

        $this->validate($request, $rules);

        /** @var VisitaDomiciliaria $vsd**/
        $vsd = VisitaDomiciliaria::find($id);
        $vsd->viatico()->create($request->all());

        return $this->created();
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
        $rules = [
            'origen'    => 'required|string',
            'destino'   => 'required|string',
            'cantidad'  => 'required|numeric',
        ];

        $this->validate($request, $rules);

        $programacion = Programacion::find($id);
        $programacion->update($request->all());

        return $this->updated();
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     * @throws
     */
    public function destroy($id)
    {
        /**@var Programacion $programacion*/
        $programacion = Programacion::find($id);
        $isDeleted = $programacion->delete();

        if ($isDeleted) {
            return $this->deleted();
        }

    }
}

<?php

namespace App\Http\Controllers\Esp\VisitaDomiciliaria\Viatico;

use App\Http\Controllers\Controller;
use App\Helpers\Helper;
use App\Models\Esp\VisitaDomiciliaria\Programacion\Programacion;
use App\Models\Esp\VisitaDomiciliaria\VisitaDomiciliaria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ViaticoController extends Controller
{

    /**
     * @param $id
     * @return
     */
    public function index($id)
    {
        $vsd = VisitaDomiciliaria::find($id);
        $records = $vsd->viatico()->get();

        if ($records->count() == 0) {
            Helper::throwModelNotFoud(Viatico::class);
        }

        return $records;
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

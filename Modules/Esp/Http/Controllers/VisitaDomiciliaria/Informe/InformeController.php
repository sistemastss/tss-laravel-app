<?php


namespace Modules\Esp\Http\Controllers\VisitaDomiciliaria\Informe;

use App\Helpers\File;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Informe;
use Illuminate\Http\Request;
use Modules\Esp\Entities\VisitaDomiciliaria\VisitaDomiciliaria;
use Modules\Shared\Entities\CentroCosto;

class InformeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $id)
    {
        $vsd = VisitaDomiciliaria::find($id);
        $data = $vsd->informe()->firstOrFail();
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
    public function store(Request $request, $id)
    {
        $data = $this->validateData($request->all());

        $file = $data['foto_evaluado'];
        $fileName = File::uploadFile($file);
        $data['foto_evaluado'] = $fileName;

        $file = $data['logo_cliente'];
        $fileName = File::uploadFile($file);
        $data['logo_cliente'] = $fileName;

        $vsd = VisitaDomiciliaria::find($id);
        $vsd->informe()->create($data);

        return $this->created();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ServicioEsp  $servicioEsp
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function destroy(Informe $informe)
    {
        $isDeleted = $informe->delete();

        if ($isDeleted) {
            return $this->deleted();
        }
    }

    /**
     * @param $payload
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function validateData(array $payload)
    {
        $rules = [
            'foto_evaluado' => 'required',
            'logo_logo'     => 'required',
        ];

        Helper::validator($payload, $rules);

        return $payload;
    }

}
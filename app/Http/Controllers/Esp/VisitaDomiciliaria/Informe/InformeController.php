<?php


namespace App\Http\Controllers\Esp\VisitaDomiciliaria\Informe;

use App\Helpers\File;
use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Esp\VisitaDomiciliaria\Informe\Informe;
use App\Models\Esp\VisitaDomiciliaria\VisitaDomiciliaria;
use Illuminate\Http\Request;

class InformeController extends Controller
{
    public function index($id)
    {
        $vsd = VisitaDomiciliaria::find($id);
        $data = $vsd->informe()->firstOrFail();
        return $data;

    }

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

    public function destroy($id)
    {
        $informe = Informe::find($id);
        $isDeleted = $informe->delete();

        if ($isDeleted) {
            return $this->deleted();
        }
    }
    
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
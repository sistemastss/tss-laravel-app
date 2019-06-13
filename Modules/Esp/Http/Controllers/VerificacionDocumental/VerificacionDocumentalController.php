<?php

namespace App\Http\Controllers\Esp\VerificacionDocumental;

use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Resources\VerificacionDocumentalResource;
use App\ServicioEsp;
use App\VerificacionDocumental;
use Illuminate\Http\Request;

class VerificacionDocumentalController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->verificacionDocumental()->firstOrFail();
        $data = new VerificacionDocumentalResource($record);
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, ServicioEsp $servicioEsp)
    {
        if ($servicioEsp->verificacionDocumental()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $value = $this->transformRequest($request);
        $record = $servicioEsp->verificacionDocumental()->create($value);

        $record->refresh();

        $data = new VerificacionDocumentalResource($record);
        return $this->showOne($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param ServicioEsp $servicioEsp
     * @param $verificacionDocumental
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(Request $request, ServicioEsp $servicioEsp, $verificacionDocumental)
    {
        $record = $servicioEsp->verificacionDocumental()->findOrFail($verificacionDocumental);
        $value = $this->transformRequest($request);

        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $record->refresh();
        $data = new VerificacionDocumentalResource($record);
        return $this->showOne($data);
    }


    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
    private function transformRequest(Request $request) {

        $rules = [
            'documento'             => 'required',
            'libretaMilitar'        => 'required',
            'licenciaConduccion'    => 'required',
            'tarjetaProfesional'    => 'required',
            'diplomaBachiller'      => 'required',
            'diplomaTecnico'        => 'required',
            'diplomaTecnologo'      => 'required',
            'diplomaPregrado'       => 'required',
            'diplomaPostgrado'      => 'required',
            'diplomaCursos'         => 'required',
            'observaciones'         => 'required',
        ];

        $this->validate($request, $rules);

        return [
            'cedula_ciudadania'         => $request->get('documento'),
            'libreta_militar'           => $request->get('libretaMilitar'),
            'licencia_conduccion'       => $request->get('licenciaConduccion'),
            'tarjeta_profesional'       => $request->get('tarjetaProfesional'),
            'diploma_bachiller'         => $request->get('diplomaBachiller'),
            'diploma_tecnico'           => $request->get('diplomaTecnico'),
            'diploma_tecnologo'         => $request->get('diplomaTecnologo'),
            'diploma_pregrado'          => $request->get('diplomaPregrado'),
            'diploma_postgrado'         => $request->get('diplomaPostgrado'),
            'diploma_cursos'            => $request->get('diplomaCursos'),
            'observaciones'             => $request->get('observaciones'),
        ];
    }
}

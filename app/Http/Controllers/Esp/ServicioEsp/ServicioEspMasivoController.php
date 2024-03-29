<?php

namespace App\Http\Controllers\Esp\ServicioEsp;

use App\CentroCosto;
use App\Http\Controllers\ApiController;
use App\Http\Resources\ServicioEspResource;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use App\Http\Controllers\Helpers\Helper;
use Rap2hpoutre\FastExcel\FastExcel;

class ServicioEspMasivoController extends ApiController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  CentroCosto $centroCosto
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(Request $request, CentroCosto $centroCosto)
    {
        $anexo = $request->get('anexo');
        $time = time();

        $file = [
            'content' => Helper::fileFromBlob($anexo),
            'path' => "public/files/",
            'name' => "esp masivo.xlsx",
        ];

        Helper::saveFileUploaded($file);
        $fileUrl = "storage/files/esp masivo.xlsx";
        $collection = $this->leerExcel($fileUrl)->toArray();
        // delete file
        // Storage::delete("public/files/test{$time}.xls");
        $centroCosto->servicioEsp()->createMany($collection)->each(
            function ($esp) {
                $this->crearActividades($esp);
            }
        );

        $response = array(
            'status' => 'success',
        );
        return $this->showAll($response);
    }


    private function leerExcel($path) {
        return (new FastExcel)->import($path, function($reader) {
            if ($reader['Evaluado']) {
                return [
                    'evaluado'          => $reader['Evaluado'],
                    'tipo_documento'    => $reader['Tipo de Documento'],
                    'documento'         => (int)$reader['Documento de identidad'],
                    'ciudad'            => $reader['Ciudad de desarrollo del servicio'],
                    'telefono'          => (int)$reader['Telefono'],
                    'email'             => $reader['Email'],
                    'direccion'         => $reader['Dirección'],
                    'observaciones'     => $reader['Observaciones'],
                    'tipo_esp'          => $reader['Tipo de servicio'],
                    'aceptar_terminos'  => true,
                ];
            }
        });
    }


    /**
     * @param ServicioEsp $esp
     */
    private function crearActividades(ServicioEsp $esp) {

        $actividades = ServicioEsp::getActividades($esp->tipo_esp);

        if (count($actividades) == 0) {
            return;
        }

        foreach ($actividades as $actividad) {
            $esp->actividades()->create(['actividad_codigo' => $actividad]);
        }

    }


    /**
     * @param Request $request
     * @return array
     * @throws \Illuminate\Validation\ValidationException
     */
}

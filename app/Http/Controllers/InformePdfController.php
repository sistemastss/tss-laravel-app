<?php

namespace App\Http\Controllers;

use App\ServicioEsp;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InformePdfController extends ApiController
{
    /**
     * Display a listing of the resource.
     * @param Request $request
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $servicioEsp)
    {
        //

        if ($request->has('datosPersonales')) {
            $data = $request->get('datosPersonales');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/datos_personales.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);





        } if ($request->has('historialJudicial')) {
            $data = $request->get('historialJudicial');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/historial_judicial.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);





        } else if ($request->has('verificacionAcademica')) {
            $data = $request->get('verificacionAcademica');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/verificacion_academica.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);





        } else if ($request->has('verificacionLaboral')) {
            $data = $request->get('verificacionLaboral');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/verificacion_laboral.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);





        } else if ($request->has('evaluacionFinanciera')) {
            $data = $request->get('evaluacionFinanciera');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/evaluacion_financiera.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);





        } else if ($request->has('entornoHabitacional')) {
            $data = $request->get('entornoHabitacional');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/historial_judicial/entado_habitacional.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);





        } else if ($request->has('estadoSalubridad')) {
            $data = $request->get('estadoSalubridad');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/historial_judicial/estado_salubridad.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);




        } else if ($request->has('informacionFamiliar')) {
            $data = $request->get('informacionFamiliar');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/historial_judicial/informacion_familiar.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);





        } else if ($request->has('modusVivendi')) {
            $data = $request->get('modusVivendi');
            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);
            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/historial_judicial/modus_vivendi.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);



        } else if ($request->has('dictamenGrafologico')) {
            $data = $request->get('dictamenGrafologico');
            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);
            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/dictamen_grafologico.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);




        } else if ($request->has('decadactilar')) {
            $data = $request->get('decadactilar');
            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);
            //decode base64 string
            $image = base64_decode($base64_str);
            $name = 'public/'.$servicioEsp.'/decadactilar.png';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);
        }



        /*else if ($request->has('verificacionAcademica')) {
            $fileName = 'public/'.$servicioEsp.time().'.png';
            $request->file('verificacionAcademica')->storeAs($servicioEsp, $fileName);
        }*/


        return $this->showMessage('success', 200);
        // $pdf = PDF::loadView('pdf.informe');
        // return $pdf->download('invoice.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

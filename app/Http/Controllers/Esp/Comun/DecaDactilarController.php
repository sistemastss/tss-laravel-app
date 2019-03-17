<?php

namespace App\Http\Controllers\Esp\Comun;

use App\DecaDactilar;
use App\Exceptions\ModelHasOneRecordExeption;
use App\Exceptions\ModelNotUpdateException;
use App\Http\Controllers\ApiController;
use App\Http\Requests\EspRequest;
use App\Http\Resources\ComunEspResource;
use App\ServicioEsp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DecaDactilarController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @param ServicioEsp $servicioEsp
     * @return \Illuminate\Http\Response
     */
    public function index(ServicioEsp $servicioEsp)
    {
        $record = $servicioEsp->decaDactilar()->firstOrFail();
        $data = new ComunEspResource($record);
        return $this->showOne($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  EspRequest $request
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function store(EspRequest $request, ServicioEsp $servicioEsp)
    {
        if ($servicioEsp->decaDactilar()->exists()) {
            throw new ModelHasOneRecordExeption();
        }

        $value = $this->transformResponse($request);
        $record = $servicioEsp->decaDactilar()->create($value);
        $data = new ComunEspResource($record);
        return $this->showOne($data);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  EspRequest  $request
     * @param ServicioEsp $servicioEsp
     * @param $decaDactilar
     * @return \Illuminate\Http\Response
     * @throws
     */
    public function update(EspRequest $request, ServicioEsp $servicioEsp, $decaDactilar)
    {
        $record = $servicioEsp->decaDactilar()->findOrFail($decaDactilar);
        $value = $this->transformResponse($request);
        $record->fill($value);

        if ($record->isClean()) {
            throw new ModelNotUpdateException();
        }

        $record->save();
        $data = new ComunEspResource($record);
        return $this->showOne($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DecaDactilar  $decaDactilar
     * @return \Illuminate\Http\Response
     */
    public function destroy(DecaDactilar $decaDactilar)
    {
        //
    }

    private function transformResponse(Request $request)
    {
        $rules = [
            'adjunto' => 'required',
            'conclusion' => 'required'
        ];

        $this->validate($request, $rules);

        $flag = false;
        if ($request->has('adjunto')) {
            $flag = true;
            $data = $request->get('adjunto');

            //get the base-64 from data
            $base64_str = substr($data, strpos($data, ",")+1);

            //decode base64 string
            $image = base64_decode($base64_str);
            $name = time().'.docx';
            Storage::disk('local')->put($name, $image);
            $storagePath = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
            //return $storagePath.'imgage.png';
            $url = Storage::url($name);
        }

        return [
            'adjunto'   => $flag ? $url : $request->get('fotografia'),
            'conclusion' => $request->get('conclusion')
        ];
    }
}

<?php

namespace App\Http\Controllers\Esp\VisitaDomiciliaria\Seguimiento;

use App\Http\Controllers\Controller;
use App\Mail\SeguimientoMail;
use App\Models\Esp\VisitaDomiciliaria\VisitaDomiciliaria;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\URL;

class SeguimientoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index($id)
    {
        $vsd = VisitaDomiciliaria::find($id);
        return $vsd->seguimiento()->firstOrFail();
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     * @throws
     */
    public function store(Request $request, $visitaDomId)
    {
        $rules = ['mail_destino' => 'required|email'];
        $this->validate($request, $rules);

        $token = str_random(60);
        $mailDestino = $request->get('mail_destino');

        $data = [
            'mail_destino'       => $mailDestino,
            'token_verificacion' => $token,
        ];

        $visitaDom = VisitaDomiciliaria::find($visitaDomId);

        $visitaDom->seguimiento()->create($data);

        // $record = $visitaDom->programacion()->firstOrFail();
        Carbon::setLocale('es');
        setlocale(LC_TIME, 'es_ES');

        $mailData = [
            'url' => URL::to("seguimiento/".$token),
            'dia' => Carbon::createFromTimestamp(time())->formatLocalized('%A %d'), // $record->fecha,
            'mes' => Carbon::createFromTimestamp(time())->formatLocalized('%B'), // $record->fecha,
            'anno' => Carbon::createFromTimestamp(time())->formatLocalized('%Y'), // $record->fecha,
            'hora'  => Carbon::createFromTimestamp(time())->format('H:m'),
        ];

        Mail::to($mailDestino)->send(new SeguimientoMail($mailData));

        return $this->created();
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        return view('esp::show');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateData($payload)
    {
        $rules = [
            'correo_destino' => 'required|string',
        ];
    }
}

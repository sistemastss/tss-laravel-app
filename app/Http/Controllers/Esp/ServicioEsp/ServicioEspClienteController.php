<?php

namespace App\Http\Controllers\Esp\ServicioEsp;

use App\Http\Controllers\ApiController;
use App\Http\Resources\ServicioEspResource;
use App\ServicioEsp;
use App\Usuario;
use Illuminate\Http\Request;

class ServicioEspClienteController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Usuario $usuario)
    {
        //
        if (!$usuario->has('centroCosto')) {
            return $this->showError('No tiene servicios creados', 422);
        }

        $usuarioId = $usuario->id;
        $serviciosEsp = ServicioEsp::all()->filter(
            function (ServicioEsp $servicioEsp) use ($usuarioId) {
                if ($servicioEsp->centroCosto->usuario->id == $usuarioId) {
                    return $servicioEsp;
                }
            }
        );

        $serviciosEspCollection = ServicioEspResource::collection($serviciosEsp);

        return $this->showAll($serviciosEspCollection);
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
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}

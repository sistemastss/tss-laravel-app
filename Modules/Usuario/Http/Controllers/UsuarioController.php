<?php

namespace Modules\Usuario\Http\Controllers;

use App\Http\Resources\FuncionarioResource;
use App\Http\Resources\UsuarioResource;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Modules\Usuario\Entities\Usuario;

class UsuarioController extends Controller
{

    public function showUsuarios()
    {
        return Usuario::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->isJson()) {

            $data = $request->json()->all();

            $user = Usuario::where('nombre', $data['user'])->first();

            return response()->json($user, 300);
        }
    }

    public function getToken(Request $request) {
        //return response()->json($request);

        if (!$request->isJson()) {
            return response()->json(['error' => 'unauthorized'], 401);
        }

        try {
            $email     = $request->get('username');
            $password  = $request->get('password');

            $usuario = Usuario::where('mail', $email)
                ->where('contrasena', $password)
                ->get()
                ->transform(function (Usuario $usuario) {
                    return new UsuarioResource($usuario);
                });

            return response()->json($usuario[0], 200);

        } catch (ModelNotFoundException $exception) {
            return response()->json(['error' => 'not found'], 404);
        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Usuario::create([
            'rol_id'        => $request->get('rol_id'),
            'nombre'        => $request->get('nombre'),
            'direccion'     => $request->get('direccion'),
            'telefono'      => $request->get('telefono'),
            'celular'       => $request->get('celular'),
            'tipo_documento'=> $request->get('tipo_documento'),
            'documento'     => $request->get('documento'),
            'ciudad'        => $request->get('ciudad'),
            'email'         => $request->get('email'),
            'contrasena'    => $request->get('contrasena'),
        ]);

        return $this->showOne($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($rolId, Request $request)
    {
        //

        if (!$request->isJson()){
            return response()->json(['error' => ['unauthorized']]);
        }

        $usuario = Usuario::where('rol_id', $rolId)->get()->transform(function (Usuario $usuario) {
            return new FuncionarioResource($usuario);
        });

        return response()->json($usuario, 200);
    }


    public function showUsuario($id, Request $request) {
        if (!$request->isJson()){
            return response()->json(['error' => ['unauthorized']]);
        }

        return response()->json(new FuncionarioResource(Usuario::where('id', $id)->first()));


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

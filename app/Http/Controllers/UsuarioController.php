<?php

namespace App\Http\Controllers;

use App\Http\Resources\FuncionarioResource;
use App\Http\Resources\UsuarioResource;
use App\Usuario;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;
use PhpParser\Node\Expr\Cast\Int_;
use Psy\Util\Str;

class UsuarioController extends Controller
{
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

            /**$user = array([
                'nombre' => 'cristian',
                'email' => 'styven21121@gm.com',
                'password' => '12345',
                'api_token' => str_random(60)
            ]);

            return response()->json($user, 201);*/
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
        //
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

<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/esp', function (Request $request) {
    return $request->user();
});

route::get('/esp-module', function () {
   return 'Hello world';
});

Route::apiResource('esp', 'EspController', ['except' =>'delete']);

Route::apiResource('esp.visita-domiciliaria', 'VisitaDomiciliaria\VisitaDomiciliariaController', ['only' => ['index', 'store']]);
Route::apiResource('visita-domiciliaria', 'VisitaDomiciliaria\VisitaDomiciliariaController', ['except' => ['index', 'store', 'show']]);

Route::apiResource('visita-domiciliaria.seguimiento', 'VisitaDomiciliaria\Seguimiento\SeguimientoController', ['only' => ['index', 'store']]);
Route::apiResource('seguimiento', 'VisitaDomiciliaria\Seguimiento\SeguimientoController', ['except' => ['index', 'store', 'show']]);

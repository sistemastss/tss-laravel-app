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

/*Route::middleware('auth:api')->get('/esp', function (Request $request) {
    return $request->user();
});*/

Route::apiResource('actividades', 'ActividadController');

//actividades
Route::get('actividad', 'ActividadController@index');
Route::post('actividad', 'ActividadController@store');
Route::put('actividad/{id}', 'ActividadController@update');

route::get('esp/{id}/actividades-aplicadas', 'ActividadAplicadaController@fromEsp');


//esp
Route::get('esp', 'Esp\EspController@index');
Route::post('esp', 'Esp\EspController@store');
Route::put('esp/{id}', 'Esp\EspController@update');
Route::delete('esp/{id}', 'Esp\EspController@delete');


//visita domiciliairia
Route::get('esp/{id}/vsd', 'Esp\VisitaDomiciliaria\VisitaDomiciliariaController@index');
Route::post('esp/{id}/vsd', 'Esp\VisitaDomiciliaria\VisitaDomiciliariaController@store');
Route::put('vsd{id}', 'Esp\VisitaDomiciliaria\VisitaDomiciliariaController@update');


//programacion
Route::get('vsd/{id}/programacion', 'Esp\VisitaDomiciliaria\Programacion\ProgramacionController@index');
Route::post('vsd/{id}/programacion', 'Esp\VisitaDomiciliaria\Programacion\ProgramacionController@store');
Route::put('programacion', 'Esp\VisitaDomiciliaria\Programacion\ProgramacionController@update');


//viaticos
Route::get('vsd/{id}/viatico', 'Esp\VisitaDomiciliaria\Viatico\ViaticoController@index');
Route::post('vsd/{id}/viatico', 'Esp\VisitaDomiciliaria\Viatico\ViaticoController@store');
Route::put('viatico', 'Esp\VisitaDomiciliaria\Viatico\ViaticoController@update');


//seguimiento
Route::get('vsd/{id}/seguimiento', 'Esp\VisitaDomiciliaria\Seguimiento\SeguimientoController@index');
Route::post('vsd/{id}/seguimiento', 'Esp\VisitaDomiciliaria\Seguimiento\SeguimientoController@store');
Route::put('seguimiento', 'Esp\VisitaDomiciliaria\Seguimiento\SeguimientoController@update');


//informe
Route::get('vsd/{id}/informe', 'Esp\VisitaDomiciliaria\Informe\InformeController@index');
Route::post('vsd/{id}/informe', 'Esp\VisitaDomiciliaria\Informe\InformeController@store');
Route::put('informe', 'Esp\VisitaDomiciliaria\Informe\InformeController@update');







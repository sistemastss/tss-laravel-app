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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::post('/login', 'UsuarioController@getToken');

Route::apiResource('clientes', 'ClienteController', ['only' => ['index']]);

Route::apiResource('centro-costo', 'CentroCostoController');
Route::apiResource('centro-costo.servicio-esp', 'Esp\ServicioEsp\ServicioEspController', ['only' => ['store']]);
Route::apiResource('servicio-esp', 'Esp\ServicioEsp\ServicioEspController', ['except' =>'delete']);


Route::apiResource('usuario.servicios-esp', 'Esp\ServicioEsp\ServicioEspClienteController', ['only' => ['index']]);
Route::apiResource('freelance.servicios-esp', 'Esp\ServicioEsp\FrelanceController', ['only' => ['index', 'show']]);


Route::apiResource('actividades-disponibles', 'Actividad\ActividadDisponibleController');
Route::apiResource('servicio-esp.actividades', 'Actividad\ActividadAplicadaController', ['only' => ['index']]);
Route::apiResource('actividad-aplicada', 'ActividadesController', ['only' => ['show', 'update']]);
Route::apiResource('actividad-aplicada.actividad-asignada', 'Actividad\ActividadAsignadaController');



/*
|--------------------------------------------------------------------------
| Usuarios
|--------------------------------------------------------------------------|
*/

//freelance
Route::apiResource('freelance', 'Usuarios\FreelanceController');






/*
|--------------------------------------------------------------------------
| Historial judicial
|--------------------------------------------------------------------------|
*/
Route::apiResource('servicio-esp.historial-judicial', 'Esp\HistorialJudicial\HistorialjudicialController', ['only' => ['index', 'store', 'update']]);







/*
|--------------------------------------------------------------------------
| Visita domiciliaria
|--------------------------------------------------------------------------
*/
Route::apiResource('servicio-esp.visita-domiciliaria', 'Esp\VisitaDomiciliariaController', ['only' => ['index']]);

//Verificacion documental apiResource
Route::apiResource('servicio-esp.verificacion-documental', 'Esp\VerificacionDocumental\VerificacionDocumentalController');


//Estado salubridad apiResource
Route::apiResource('servicio-esp.estado-salubridad', 'Esp\EstadoSalubridad\EstadoSalubridadController');


//Nucleo familiar apiResource
Route::apiResource('servicio-esp.nucleo-familiar', 'Esp\NucleoFamiliar\NucleoFamiliarController');
Route::apiResource('servicio-esp.hijos', 'Esp\NucleoFamiliar\HijoController');
Route::apiResource('servicio-esp.informacion-familiar', 'Esp\NucleoFamiliar\InformacionFamiliarController');
Route::apiResource('servicio-esp.referencias', 'Esp\NucleoFamiliar\ReferenciaController');


//Entorno habitacional apiResource
Route::apiResource('servicio-esp.entorno-habitacional', 'Esp\EntornoHabitacional\EntornoHabitacionalController');


//Modus vivendi apiResource
Route::apiResource('servicio-esp.modus-vivendi', 'Esp\ModusVivendi\ModusVivendiController');
Route::apiResource('servicio-esp.bienes-inmuebles', 'Esp\ModusVivendi\BienesInmueblesController');
Route::apiResource('servicio-esp.bienes-muebles', 'Esp\ModusVivendi\BienesMueblesController');
Route::apiResource('servicio-esp.capacidad-endeudamiento', 'Esp\ModusVivendi\CapacidadEndeudamientoController');
Route::apiResource('servicio-esp.referencias-bancarias', 'Esp\ModusVivendi\ReferenciaBancariaController');




Route::get('funcionarios/{id}', 'ClienteController@index');

Route::get('funcionarios/{id}', 'ClienteController@index');




/*
|--------------------------------------------------------------------------
| Verificacion adademica
|--------------------------------------------------------------------------
*/
Route::apiResource('servicio-esp.verificacion-academica', 'Esp\VerificacionAcademica\VerificacionAcademicaController');







/*
|--------------------------------------------------------------------------
| Verificacion laboral
|--------------------------------------------------------------------------
*/
Route::apiResource('servicio-esp.verificacion-laboral', 'Esp\VerificacionLaboral\VerificacionLaboralController');







/*
|--------------------------------------------------------------------------
| Dictamen grafologico
|--------------------------------------------------------------------------
*/
Route::apiResource('servicio-esp.dictamen-grafologico', 'Esp\Comun\DictamenGrafologicoController');







/*
|--------------------------------------------------------------------------
| Decadactilar
|--------------------------------------------------------------------------
*/
Route::apiResource('servicio-esp.decadactilar', 'Esp\Comun\DecaDactilarController');







/*
|--------------------------------------------------------------------------
| Prueba psicotecnica
|--------------------------------------------------------------------------
*/
Route::apiResource('servicio-esp.prueba-psicotecnica', 'Esp\Comun\PruebaPsicotecnicaController');

Route::get('funcionarios/{id}', 'ClienteController@index');





/*
|--------------------------------------------------------------------------
| Evaluacion financiera
|--------------------------------------------------------------------------
*/
Route::apiResource('servicio-esp.evaluacion-financiera', 'Esp\EvaluacionFinanciera\EvaluacionFinancieraController');
Route::apiResource('servicio-esp.cuentas-bancarias', 'Esp\EvaluacionFinanciera\CuentaBancariaController');
Route::apiResource('servicio-esp.obligaciones-extinguidas', 'Esp\EvaluacionFinanciera\ObligacionExtinguidaController');
Route::apiResource('servicio-esp.obligaciones-mora', 'Esp\EvaluacionFinanciera\ObligacionMoraController');
Route::apiResource('servicio-esp.obligaciones-vigentes', 'Esp\EvaluacionFinanciera\ObligacionVigenteController');
Route::apiResource('servicio-esp.obligaciones-reales', 'Esp\EvaluacionFinanciera\ObligacionVigenteRealController');







/*
|--------------------------------------------------------------------------
| Consolidado
|--------------------------------------------------------------------------
*/
Route::apiResource('servicio-esp.consolidado', 'Consolidado\ConsolidadoController');
Route::apiResource('consolidado.datos-informe', 'Consolidado\DatosInformeController');



Route::post('mail', 'MailController@index');

Route::Post('upload-informe/{id}', 'InformePdfController@index');






/*
 *
 * INVESTIGACIONES
 */
Route::post('centro-costo/{id}/investigaciones', 'Investigaciones\InvestigacionesController@store');
Route::apiResource('investigaciones', 'Investigaciones\InvestigacionesController', ['except', ['store']]);


Route::get('investigaciones/{servicio}/actividades', 'Actividad\ActividadAplicadaController@index');
Route::post('investigaciones/{servicio}/actividades', 'Actividad\ActividadAplicadaController@store');
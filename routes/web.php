<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function ()
{
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

Route::group(['prefix' => 'admin'], function()
{
	Route::get('/', 'AdminController@index')->middleware('auth');
	Route::get('/informacionAgencia', 'AdminController@informacionAgencia')->middleware('auth');
	Route::get('/informacionGeneral', 'AdminController@informacionGeneral')->middleware('auth');
	Route::get('/informacionCliente', 'AdminController@informacionCliente')->middleware('auth');
	Route::get('/informacionReferencia', 'AdminController@informacionReferencia')->middleware('auth');
	Route::get('/informacionAvalista', 'AdminController@informacionAvalista')->middleware('auth');
	Route::get('/resultadoVisita', 'AdminController@resultadoVisita')->middleware('auth');
	Route::get('/acuerdoPago', 'AdminController@acuerdoPago')->middleware('auth');
	Route::get('/comentarioVisita', 'AdminController@comentarioVisita')->middleware('auth');
	Route::get('/firma', 'AdminController@firma')->middleware('auth');

	// Guarda la información
	Route::post('/informacionAgenciaAlmacenar', 'AdminController@informacionAgenciaAlmacenar')->middleware('auth');
	Route::post('/informacionGeneralAlmacenar', 'AdminController@informacionGeneralAlmacenar')->middleware('auth');
	Route::post('/informacionClienteAlmacenar', 'AdminController@informacionClienteAlmacenar')->middleware('auth');
	Route::post('/informacionReferenciaAlmacenar', 'AdminController@informacionReferenciaAlmacenar')->middleware('auth');
	Route::post('/informacionAvalistaAlmacenar', 'AdminController@informacionAvalistaAlmacenar')->middleware('auth');
	Route::post('/resultadoVisitaAlmacenar', 'AdminController@resultadoVisitaAlmacenar')->middleware('auth');
	Route::post('/acuerdoPagoAlmacenar', 'AdminController@acuerdoPagoAlmacenar')->middleware('auth');
	Route::post('/comentarioVisitaAlmacenar', 'AdminController@comentarioVisitaAlmacenar')->middleware('auth');

	// Información almacenada
	Route::post('/verificarInformacionAgencia', 'AdminController@verificarInformacionAgencia')->middleware('auth');
	Route::post('/verificarInformacionGeneral', 'AdminController@verificarInformacionGeneral')->middleware('auth');
	Route::post('/verificarInformacionCliente', 'AdminController@verificarInformacionCliente')->middleware('auth');
	Route::post('/verificarInformacionReferencia', 'AdminController@verificarInformacionReferencia')->middleware('auth');
	Route::post('/verificarInformacionAvalista', 'AdminController@verificarInformacionAvalista')->middleware('auth');
	Route::post('/verificarResultadoVisita', 'AdminController@verificarResultadoVisita')->middleware('auth');
	Route::post('/verificarAcuerdoPago', 'AdminController@verificarAcuerdoPago')->middleware('auth');
	Route::post('/verificarComentarioVisita', 'AdminController@verificarComentarioVisita')->middleware('auth');

	// Valida el siguiente paso
	Route::post('/informacionAgenciaContinuar', 'AdminController@informacionAgenciaContinuar')->middleware('auth');
	Route::post('/informacionGeneralContinuar', 'AdminController@informacionGeneralContinuar')->middleware('auth');
	Route::post('/informacionClienteContinuar', 'AdminController@informacionClienteContinuar')->middleware('auth');
	Route::post('/informacionReferenciaContinuar', 'AdminController@informacionReferenciaContinuar')->middleware('auth');
	Route::post('/informacionAvalistaContinuar', 'AdminController@informacionAvalistaContinuar')->middleware('auth');
	Route::post('/resultadoVisitaContinuar', 'AdminController@resultadoVisitaContinuar')->middleware('auth');
	Route::post('/acuerdoPagoContinuar', 'AdminController@acuerdoPagoContinuar')->middleware('auth');
	Route::post('/comentarioVisitaContinuar', 'AdminController@comentarioVisitaContinuar')->middleware('auth');

	// Validar si es verdadero
	Route::post('/validarInformacionGeneral', 'AdminController@validarInformacionGeneral')->middleware('auth');
	Route::post('/validarInformacionCliente', 'AdminController@validarInformacionCliente')->middleware('auth');
	Route::post('/validarInformacionReferencia', 'AdminController@validarInformacionReferencia')->middleware('auth');
	Route::post('/validarInformacionAvalista', 'AdminController@validarInformacionAvalista')->middleware('auth');
	Route::post('/validarResultadoVisita', 'AdminController@validarResultadoVisita')->middleware('auth');
	Route::post('/validarResultadoVisita', 'AdminController@validarResultadoVisita')->middleware('auth');
	Route::post('/validarAcuerdoPago', 'AdminController@validarAcuerdoPago')->middleware('auth');
	Route::post('/validarComentarioVisita', 'AdminController@validarComentarioVisita')->middleware('auth');
	Route::post('/validarFirma', 'AdminController@validarFirma')->middleware('auth');

	// Otros
	Route::post('/boton', 'AdminController@boton')->middleware('auth');
	Route::post('/coordenadas', 'AdminController@coordenadas')->middleware('auth');
	Route::post('/guardar', 'AdminController@guardar')->middleware('auth');
});

Route::group(['prefix' => '/user'], function()
{
	Route::get('/', 'UserController@index')->middleware('auth');
});
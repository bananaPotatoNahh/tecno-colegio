<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use colegio\Http\Contador;

Route::get('/', function () {
    $template = 'welcome';
    Contador::insertarRegistro($template);
    $cantidad = Contador::getCantidadTemplate($template);
    return view($template, compact('cantidad'));
});

Route::post('login', 'LoginController@login');

Route::group(['middleware' => 'authLogin'], function () {
    Route::get('logout', 'LoginController@logout');
    Route::resource('persona/administrativo', 'AdministrativoController');
    Route::resource('persona/cargo', 'CargoController');
    Route::resource('persona/docente', 'DocenteController');
    Route::resource('persona/docentemateria', 'DocenteMateriaController');
    Route::resource('persona/curriculum', 'CurriculumController');
    Route::resource('persona/persona', 'PersonaController');
    Route::resource('portal/datosportal', 'DatosPortalController');
    Route::resource('portal/normas', 'NormasController');
    Route::resource('portal/reglamento', 'ReglamentosController');
    Route::resource('portal/logros', 'LogrosController');
    Route::resource('portal/objetivos', 'ObjetivosController');
    Route::resource('portal/noticias', 'NoticiasController');
    Route::resource('planestudio/planestudio', 'PlanEstudioController');
    Route::resource('planestudio/detalleplanestudio', 'DetallePlanEstudioController');
    Route::resource('planestudio/materias', 'MateriasController');
});
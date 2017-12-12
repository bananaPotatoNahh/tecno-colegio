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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('persona/administrativo','AdministrativoController');
Route::resource('persona/cargo','CargoController');
Route::resource('persona/docente','DocenteController');
Route::resource('persona/docentemateria','DocenteMateriaController');
Route::resource('persona/curriculum','CurriculumController');
Route::resource('persona/persona','PersonaController');
Route::resource('portal/datosportal','DatosPortalController');
Route::resource('portal/normas','NormasController');
Route::resource('portal/reglamento','ReglamentosController');
Route::resource('portal/logros','LogrosController');
Route::resource('portal/objetivos','ObjetivosController');
Route::resource('portal/noticias','NoticiasController');
Route::resource('planestudio/planestudio','PlanEstudioController');
Route::resource('planestudio/detalleplanestudio','DetallePlanEstudioController');
Route::resource('planestudio/materias','MateriasController');

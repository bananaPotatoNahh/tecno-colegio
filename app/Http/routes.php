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

Route::get('/', 'DatosPortalController@index');

Route::post('login', 'LoginController@login');

Route::group(['middleware' => 'authLogin'], function () {
    Route::get('logout', 'LoginController@logout');
        Route::resource('persona/administrativo', 'AdministrativoController');
        Route::resource('persona/cargo', 'CargoController');
        Route::resource('persona/docente', 'DocenteController');
        Route::resource('persona/curriculum', 'CurriculumController');
        Route::resource('persona/persona', 'PersonaController');
        Route::resource('portal/datosportal', 'DatosPortalController');
        Route::resource('portal/normas', 'NormasController');
        Route::resource('portal/reglamento', 'ReglamentosController');
        Route::resource('portal/logros', 'LogrosController');
        Route::resource('portal/objetivos', 'ObjetivosController');
        Route::resource('portal/noticias', 'NoticiasController');
        Route::resource('planestudio/planestudio', 'PlanEstudioController');
        Route::resource('planestudio/materias', 'MateriasController');
        Route::resource('buscador', 'TempleteController@show');
        Route::get('download', 'CurriculumController@descargar');
        Route::get('estadistica', 'TempleteController@personaEstadistica');
        Route::get('estadisticasvis', 'TempleteController@vistaspub');
        Route::get('estadisticasvistas', 'TempleteController@vistasEstadisticas');
        Route::get('reportes', function () {
            return view('graficos/reportes');
        });

        //rutas reportes
        Route::get('reportesadministrativos', 'AdministrativoController@reporte');
        Route::get('reportescargo', 'CargoController@reporte');
        Route::get('reportesdocente', 'DocenteController@reporte');
        Route::get('reportescurriculum', 'CurriculumController@reporte');
        Route::get('reportespersona', 'PersonaController@reporte');
        Route::get('reportesdatosportal', 'DatosPortalController@reporte');
        Route::get('reportesnormas', 'NormasController@reporte');
        Route::get('reportesreglamento', 'ReglamentosController@reporte');
        Route::get('reporteslogros', 'LogrosController@reporte');
        Route::get('reportesobjetivos', 'ObjetivosController@reporte');
        Route::get('reportesnoticias', 'NoticiasController@reporte');
        Route::get('reportesplanestudio', 'PlanEstudioController@reporte');
        Route::get('reportesmaterias', 'MateriasController@reporte');
});


// vistaspublicas
Route::get('administrativopublica', 'AdministrativoController@publica');
Route::get('curriculumpublica', 'CurriculumController@publica');
Route::get('vistapublica', 'DatosPortalController@publica');
Route::get('docentepublica', 'DocenteController@publica');
Route::get('logrospublica', 'LogrosController@publica');
Route::get('materiaspublica', 'MateriasController@publica');
Route::get('normaspublica', 'NormasController@publica');
Route::get('noticiaspublica', 'NoticiasController@publica');
Route::get('personapublica', 'PersonaController@publica');
Route::get('planestudiopublica', 'PlanEstudioController@publica');
Route::get('reglamentospublica', 'ReglamentosController@publica');

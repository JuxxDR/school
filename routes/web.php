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

Route::get('/', function () {
    return view('welcome');
});


Route::get(
    'tutor/index',
    'TutorController@index'
)->name('tutor_index');


//====================================
//          Rutas Reinscripcion
//======================================

Route::get(
    'inscripcion/',
    'InscripcionController@folio'
)->name('inscripcion_folio');

Route::post(
    'inscripcion/',
    'InscripcionController@folioPost'
)->name('inscripcion_folio_post');

Route::post(
    'inscripcion/{inscripcionId}',
    'InscripcionController@datosAlumnoPost'
)->name('inscripcion_datos_alumno_post');

//====================================
//          Rutas Docente
//======================================
Auth::routes();

Route::get('docente/inicio','Doc\DocenteController@index')->name('docente_inicio');

Route::get('docente/asistencia','Doc\AsistenciaController@index')->name('asistencia_inicio');

Route::get('docente/{id}/asistencia', 'Doc\AsistenciaController@asistio');

Route::get('docente/{id}/noAsistencia', 'Doc\AsistenciaController@noAsistio');

Route::get('docente/{id}/modificarAsistencia', 'Doc\AsistenciaController@delete');

Route::get('docente/asistencia/guardar', 'Doc\AsistenciaController@guardar');

Route::get(    'docente/cuenta','Doc\DocenteController@account')->name('docente_cuenta');

Route::get('administrativo/notificaciones','Admin\AdminController@notifications')->name('admin_notificar');

Route::get('/home', 'HomeController@index')->name('home');

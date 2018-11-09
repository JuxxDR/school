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
//          Rutas Inscripcioón
//======================================


Route::get(
    'inscripcion/',
    'InscripcionController@folio'
)->name('inscripcion_folio');

Route::post(
    'inscripcion/',
    'InscripcionController@folioPost'
)->name('inscripcion_folio_post');

Route::get(
    'inscripcion/{inscripcionId}/folio/{folioId}/alumno',
    'InscripcionController@datosAlumno'
)->name('inscripcion_datos_alumno');

Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/alumno',
    'InscripcionController@datosAlumnoPost'
)->name('inscripcion_datos_alumno_post');

Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/salud',
    'InscripcionController@datosSaludPost'
)->name('inscripcion_datos_salud_post');

Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/view/pdf',
    'PdfController@createPdf'
)->name('inscripcion_confirm_pdf');

//====================================
//          Rutas Docente
//======================================
Auth::routes();

Route::get('docente/inicio','Doc\DocenteController@index')->name('docente_inicio');

Route::get('docente/cuenta','Doc\DocenteController@account')->name('docente_cuenta');

//====================================
//          Rutas Docente-Asistencia
//======================================

Route::get('docente/asistencia','Doc\AsistenciaController@index')->name('asistencia_inicio');

Route::get('docente/{id}/asistencia', 'Doc\AsistenciaController@asistio');

Route::get('docente/{id}/noAsistencia', 'Doc\AsistenciaController@noAsistio');

Route::get('docente/{id}/modificarAsistencia', 'Doc\AsistenciaController@delete');

Route::get('docente/asistencia/guardar', 'Doc\AsistenciaController@guardar');

//====================================
//          Rutas Docente-Tareas
//======================================

Route::get('docente/tareas','Doc\TareaController@index')->name('tarea_inicio');

Route::get('docente/tareas/entregas/{id}','Doc\TareaController@entrega')->name('tarea_entrega');
//====================================
//          Rutas Admin
//======================================;

Route::get('administrativo/notificaciones','Admin\AdminController@notifications')->name('admin_notificar');

Route::post('administrativo/anuncio/general','Admin\AnuncioController@general')->name('admin_general');


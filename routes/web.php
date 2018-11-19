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


Route::get(
    'inscripcion/{inscripcionId}/folio/{folioId}/integracion',
    'InscripcionController@datosIntegracion'
)->name('inscripcion_datos_integracion');

Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/integracion',
    'InscripcionController@datosIntegracionPost'
)->name('inscripcion_datos_integracion_post');


Route::get(
    'inscripcion/{inscripcionId}/folio/{folioId}/padres',
    'InscripcionController@datosPadres'
)->name('inscripcion_datos_padres');

Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/padres',
    'InscripcionController@datosPadresPost'
)->name('inscripcion_datos_padres_post');

Route::get(
    'inscripcion/{inscripcionId}/folio/{folioId}/emergencia',
    'InscripcionController@datosEmergencia'
)->name('inscripcion_datos_emergencia');

Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/emergencia',
    'InscripcionController@datosEmergenciaPost'
)->name('inscripcion_datos_emergencia_post');


Route::get(
    'inscripcion/{inscripcionId}/folio/{folioId}/salud',
    'InscripcionController@datosSalud'
)->name('inscripcion_datos_salud');

Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/salud',
    'InscripcionController@datosSaludPost'
)->name('inscripcion_datos_salud_post');


Route::get(
    'inscripcion/{inscripcionId}/folio/{folioId}/personas_aut',
    'InscripcionController@datosPersonasAut'
)->name('inscripcion_datos_personas_aut');

Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/personas_aut',
    'InscripcionController@datosPersonasAutPost'
)->name('inscripcion_datos_personas_aut_post');


Route::get(
    'inscripcion/{inscripcionId}/folio/{folioId}/eventos',
    'InscripcionController@datosEventos'
)->name('inscripcion_datos_eventos');

Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/eventos',
    'InscripcionController@datosEventosPost'
)->name('inscripcion_datos_eventos_post');


Route::post(
    'inscripcion/{inscripcionId}/folio/{folioId}/view/pdf',
    'PdfController@createPdf'
)->name('inscripcion_confirm_pdf');

//====================================
//          Rutas Docente
//======================================
Auth::routes();

Route::get('docente/inicio', 'Doc\DocenteController@index')->name('docente_inicio');

Route::get('docente/cuenta', 'Doc\DocenteController@account')->name('docente_cuenta');

//====================================
//          Rutas Docente-Asistencia
//======================================

Route::get('docente/asistencia', 'Doc\AsistenciaController@index')->name('asistencia_inicio');

Route::get('docente/{id}/asistencia', 'Doc\AsistenciaController@asistio');

Route::get('docente/{id}/noAsistencia', 'Doc\AsistenciaController@noAsistio');

Route::get('docente/{id}/modificarAsistencia', 'Doc\AsistenciaController@delete');

Route::get('docente/asistencia/guardar', 'Doc\AsistenciaController@guardar');

Route::get('docente/asistencia/consulta', 'Doc\AsistenciaController@consulta')->name('asistencia_consulta');

Route::post('docente/asistencia/consultarFecha', 'Doc\AsistenciaController@consultaFecha');

//====================================
//          Rutas Docente-Tareas
//======================================

Route::get('docente/tareas', 'Doc\TareaController@index')->name('tarea_inicio');

Route::get('docente/tarea/entregas/{id}', 'Doc\TareaController@entrega')->name('tarea_entrega');

Route::post('docente/tarea/entregas/registro', 'Doc\TareaController@registro')->name('tarea_registro');

Route::post('docente/agregar', 'Doc\TareaController@create')->name('tarea_agregar');
//====================================
//          Rutas Admin
//======================================;

Route::get('administrativo/notificaciones', 'Admin\AdminController@notifications')->name('admin_notificar');

Route::post('administrativo/anuncio/general', 'Admin\AnuncioController@general')->name('admin_general');

Route::post('administrativo/anuncio/grupo', 'Admin\AnuncioController@grupo')->name('admin_grupo');

Route::post('administrativo/anuncio/alumno', 'Admin\AnuncioController@alumno')->name('admin_alumno');

Route::get('administrativo/docentes', 'Admin\AdminController@docentes')->name('admin_docentes');

Route::get('administrativo/grupos', 'Admin\AdminController@grupos')->name('admin_grupos');

Route::get('administrativo/reportes', 'Admin\AdminController@reportes')->name('admin_reportes');

Route::post('administrativo/actualizar/docente', 'Admin\AdminController@actualizarDocente')->name('actualizar_docente');

Route::post('administrativo/docentes/crear', 'Admin\AdminController@crearDocente')->name('crear_docente');


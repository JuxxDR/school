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
    'reinscripcion/',
    'ReinscripcionController@index'
)->name('reinscripcion_no_control');

Route::post(
    'reinscripcion/',
    'ReinscripcionController@indexPost'
)->name('reinscripcion_no_control_post');

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
    'inscripcion/{inscripcionId}/folio/{folioId}/saving_data',
    'InscripcionController@finalSave'
)->name('inscripcion_final_save');

Route::get(
    'inscripcion/pdf',
    'PdfController@createPdf'
)->name('inscripcion_confirm_pdf');

Auth::routes();

//====================================
//          Rutas Docente
//======================================


Route::get('docente/inicio', 'Doc\DocenteController@index')->name('docente_inicio');

Route::get('docente/cuenta', 'Doc\DocenteController@account')->name('docente_cuenta');

Route::post('docente/cambioContraseña', 'Doc\DocenteController@cambioContraseña')->name('docente_pass');

Route::group(['middleware' => 'docente',], function () {
//====================================
//          Rutas Docente-Asistencia
//======================================

    Route::get('docente/asistencia', 'Doc\AsistenciaController@index')->name('asistencia_inicio');

    Route::get('docente/{id}/asistencia', 'Doc\AsistenciaController@asistio');

    Route::get('docente/{id}/noAsistencia', 'Doc\AsistenciaController@noAsistio');

    Route::get('docente/{id}/modificarAsistencia', 'Doc\AsistenciaController@delete');

    Route::post('docente/asistencia/guardar', 'Doc\AsistenciaController@registro');

    Route::get('docente/asistencia/consulta', 'Doc\AsistenciaController@consulta')->name('asistencia_consulta');

    Route::post('docente/asistencia/consultarFecha', 'Doc\AsistenciaController@consultaFecha');

    Route::post('docente/asistencia/descargaPDF', 'Doc\AsistenciaController@descargaPDF');

//====================================
//          Rutas Docente-Tareas
//======================================

    Route::get('docente/tareas', 'Doc\TareaController@index')->name('tarea_inicio');

    Route::get('docente/tarea/entregas/{id}', 'Doc\TareaController@entrega')->name('tarea_entrega');

    Route::post('docente/tarea/entregas/registro', 'Doc\TareaController@registro')->name('tarea_registro');

    Route::post('docente/agregar', 'Doc\TareaController@create')->name('tarea_agregar');

    Route::post('docente/tarea/descargaPDF', 'Doc\TareaController@descargaPDF');

//====================================
//          Rutas Docente-Reportes
//======================================

    Route::get('docente/reporte', 'Doc\DocenteController@reportes')->name('docente_reportes');

    Route::post('docente/reporte/evaluacionAlumno', 'Doc\DocenteController@guardarReporte')->name('docente_evaluar');

    Route::post('docente/reporte/evaluacionAlumnoModificar', 'Doc\DocenteController@modificarReporte')->name('docente_mdificar_reporte');

    Route::post('docente/reporte/alumno', 'Doc\DocenteController@buscarReporteAlumno')->name('docente_reportesAlumno');

    Route::get('docente/reporte/{id}', 'Doc\DocenteController@PDFReporteAlumno')->name('docente_reportesPDF');

});
//====================================
//          Rutas Admin
//======================================;
Route::group(['middleware' => 'admin',], function () {

    Route::get('administrativo/primerTrimestre', 'Admin\AdminController@habilitarPrimer')->name('admin_habilitar1');

    Route::get('administrativo/segundoTrimestre', 'Admin\AdminController@habilitarSegundo')->name('admin_habilitar2');

    Route::get('administrativo/tercerTrimestre', 'Admin\AdminController@habilitarTercer')->name('admin_habilitar3');

    Route::get('administrativo/notificaciones', 'Admin\AdminController@notifications')->name('admin_notificar');

    Route::get('administrativo/HistorialNotificaciones', 'Admin\AnuncioController@obtenerAnuncios')->name('admin_historial');

    Route::post('administrativo/anuncio/general', 'Admin\AnuncioController@general')->name('admin_general');

    Route::post('administrativo/anuncio/grupo', 'Admin\AnuncioController@grupo')->name('admin_grupo');

    Route::post('administrativo/anuncio/alumno', 'Admin\AnuncioController@alumno')->name('admin_alumno');

    Route::get('administrativo/docentes', 'Admin\AdminController@docentes')->name('admin_docentes');

    Route::get('administrativo/grupos', 'Admin\AdminController@grupos')->name('admin_grupos');

    Route::get('administrativo/grupos/crear', 'Admin\AdminController@crearGrupos')->name('admin_creaG');

    Route::post('administrativo/grupos/asignarDocentes', 'Admin\AdminController@asignarGrupos')->name('admin_asignaGrupos');

    Route::get('administrativo/reportes', 'Admin\AdminController@reportes')->name('admin_reportes');

    Route::post('administrativo/actualizar/docente', 'Admin\AdminController@actualizarDocente')->name('actualizar_docente');

    Route::get('administrativo/eliminarD/{id}', 'Admin\AdminController@deleteDocente')->name('eliminar_docente');

    Route::get('administrativo/grupo/{id}', 'Admin\AdminController@grupoDocente')->name('buscar_grupoDocente');

    Route::get('administrativo/grupo/asistenciaG/{id}', 'Admin\AdminController@asistenciaGrupo')->name('asistencia_grupo');

    Route::get('administrativo/grupo/tareaG/{id}', 'Admin\AdminController@tareaGrupo')->name('tarea_grupo');

    Route::get('administrativo/grupo/reporte/{id}', 'Doc\DocenteController@PDFReporteAlumno')->name('admin_reporteG');

    Route::post('administrativo/docentes/crear', 'Admin\AdminController@crearDocente')->name('crear_docente');

    Route::post('administrativo/grupo/asistencia/consultarFecha', 'Admin\AdminController@descargaAsistenciaPDF')->name('admin_asistenciaPDF');

    Route::post('administrativo/grupo/tarea/registro', 'Admin\AdminController@descargaTareaPDF')->name('admin_tareaPDF');
});

//====================================
//          Rutas Padres
//======================================

Route::get('tutor/login', 'Tutor\LoginController@index')->name('padre_login');

Route::post('tutor/inicio', 'Tutor\LoginController@postLogin')->name('padre_inicio');

Route::post('tutor/descargaReporteEvaluacion', 'Tutor\ReporteController@generaPDF');

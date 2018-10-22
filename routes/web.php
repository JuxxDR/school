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


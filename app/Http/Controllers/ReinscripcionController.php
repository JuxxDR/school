<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 24/11/2018
 * Time: 07:09 PM
 */

namespace App\Http\Controllers;


use App\Http\Request\CheckNoControlRequest;
use App\Model\Alumno;

class ReinscripcionController extends Controller
{
    public function index()
    {
        return view('reinscripcion.no_control');
    }

    public function indexPost(CheckNoControlRequest $request)
    {
        $validator = \Validator::make($request->all(), []);
        $noControl = $request->input("no_control");
        //Alumno
        $alumno = Alumno::whereNoControl($noControl)->first();
        $password = $alumno->password;
        if ($password !== $request->input('password')) {
            $validator->getMessageBag()->add('general',
                'Usuario y/o contraseña incorectos');
            return
                redirect()
                    ->route('reinscripcion_no_control')
                    ->withErrors($validator)
                    ->withInput();
        }
        \Session::flush();

        $alumno->grado = $alumno->grado === 3 ?: $alumno->grado + 1;
        //Salud
        $infSalud = $alumno->singleInfSalud;
        $enfermedades = $infSalud->enfermedades;
        $detectado = $infSalud->detectado;
        $antecedente = $infSalud->antecedentes;
        $salud["infSalud"] = $infSalud;
        $salud["enfermedades"] = $enfermedades;
        $salud["detectado"] = $detectado;
        $salud["antecedente"] = $antecedente;
        //Familia
        $familia = $alumno->familia;
        $padres['madre'] = $familia->padres()->whereParentesco("madre")->first();
        $padres['padre'] = $familia->padres()->whereParentesco("padre")->first();
        $emergencia = $familia->emergencia;
        $personasAut = $familia->autorizadas;
        //Eventos
        $eventos = $alumno->eventos;

        $inscripcion = $alumno->inscripcion;
        $folio = $inscripcion->folio;
        \Session::put('alumno', $alumno);
        \Session::put('salud', $salud);
        \Session::put("familia", $familia);
        \Session::put('padres', $padres);
        \Session::put('emergencia', $emergencia);
        \Session::put('personasAut', $personasAut);
        \Session::put('eventos', $eventos);
        \Session::put('reinscripcion', true);


        return redirect()->route(
            'inscripcion_datos_alumno', ['inscripcion' => $inscripcion,
            'folio' => $folio
        ]);
    }
}
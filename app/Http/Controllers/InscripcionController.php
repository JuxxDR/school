<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 02:37 PM
 */

namespace App\Http\Controllers;


use App\Http\Request\CheckFolioRequest;
use App\model\Folios;
use App\model\Inscripciones;
use Request;

class InscripcionController extends Controller
{
    public function folio()
    {
        return view('inscripcion.folio');
    }

    public function folioPost(CheckFolioRequest $request)
    {
        $folio = Folios::whereFolio($request->input('folio'))->first();
        $inscripcion = new Inscripciones();
        $inscripcion->folio_id = $folio->id;
        $inscripcion->save();
        return view('inscripcion.inscripcion', ['folio' => $folio])->with('inscripcionId', $inscripcion->id);
    }

    public function datosAlumnoPost()
    {

    }


}
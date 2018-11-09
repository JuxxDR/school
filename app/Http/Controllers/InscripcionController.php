<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 02:37 PM
 */

namespace App\Http\Controllers;


use App\Http\Request\CheckFolioRequest;
use App\Http\Request\CreateAlumnoRequest;
use App\Http\Request\CreateSaludRequest;
use App\Model\Alumno;
use App\model\AntecedesntesHereditarios;
use App\model\Detectado;
use App\model\Enfermedades;
use App\model\Folios;
use App\model\InfSalud;
use App\model\Inscripciones;
use DB;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;

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
        return redirect()->route('inscripcion_datos_alumno', ['folio' => $folio, 'inscripcion' => $inscripcion]);
//        return view('inscripcion.inscripcion', ['folio' => $folio, 'inscripcion' => $inscripcion]);
    }

    public function datosAlumno($folioId, $inscripcionId)
    {
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);
        return view('inscripcion.inscripcion', ['folio' => $folio, 'inscripcion' => $inscripcion]);
    }

    public function datosAlumnoPost(CreateAlumnoRequest $request, $folioId, $inscripcionId)
    {
        $alumno = new Alumno();
        $alumno->fill($request->all());
        $inscripcion = Inscripciones::find($inscripcionId);
        $folio = Folios::find($inscripcion->folio_id);
        return view('inscripcion.inscripcion', [
            'folio' => $folio,
            'inscripcion' => $inscripcion,
            'alumno' => $alumno
        ]);
    }

    public function datosSaludPost(CreateSaludRequest $request, $folioId, $inscripcionId)
    {

        $inscripcion = Inscripciones::find($inscripcionId);
        $alumno = new Alumno();
//        return dd($request->all());
        $alumno->fill($request->all());
        $alumno->inscripcion_id = $inscripcionId;


        $infSalud = new InfSalud();
        $infSalud->fill($request->inf_salud);
//        return dd($infSalud);
        $enfermedades = new Enfermedades();
        $enfermedades->fill($request->enfermedades);
        $detectado = new Detectado();
        $detectado->fill($request->detectado);
        $antecedente = new AntecedesntesHereditarios();
        $antecedente->fill($request->antecedente);

        return $this->finalSave($alumno, $infSalud, $enfermedades, $antecedente, $detectado, $inscripcion);
    }

    /**
     * @param $alumno Alumno
     * @param $inf_salud InfSalud
     * @param $enfermedades  Enfermedades
     * @param $antecedentes AntecedesntesHereditarios
     * @param $detectado    Detectado
     * @return \Illuminate\Http\RedirectResponse|string|void
     */
    public function finalSave($alumno, $inf_salud, $enfermedades, $antecedentes, $detectado, $inscripcion)
    {
        try {
            DB::beginTransaction();
            $alumno->no_control = Alumno::all()->count() + 1;
            $alumno->password = "nhemames";
            $transactionOk = $alumno->save();
            if ($transactionOk) {
                $inf_salud->alumno_id = $alumno->id;
                $transactionOk = $inf_salud->save();
            }

            if ($transactionOk) {
                $enfermedades->salud_id = $inf_salud->id;
                $transactionOk = $enfermedades->save();
            }

            if ($transactionOk) {
                $antecedentes->salud_id = $inf_salud->id;
                $transactionOk = $antecedentes->save();
            }

            if ($transactionOk) {
                $detectado->salud_id = $inf_salud->id;
                $transactionOk = $detectado->save();
            }
            if ($transactionOk) {
                DB::commit();
                $pdfOk = true;

                return view('inscripcion.confirmation_pdf', [
                    'alumno' => $alumno,
                    'salud' => $inf_salud,
                    'enfermedades' => $enfermedades,
                    'antecedentes' => $antecedentes,
                    'detectado' => $detectado,
                    'inscripcion' => $inscripcion,
                    'pdfOk' => $pdfOk
                ]);

                $view = \View::make('inscripcion.pdf', [
                    'alumno' => $alumno,
                    'salud' => $inf_salud,
                    'enfermedades' => $enfermedades,
                    'antecedentes' => $antecedentes,
                    'detectado' => $detectado,
                    'inscripcion' => $inscripcion,
                    'pdfOk' => $pdfOk
                ])->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->stream('invoice');

            } else {
                DB::rollBack();
                return dd(":'v");
            }
        } catch (\Exception $e) {
            return dd($e);
        }
    }
}








<?php

namespace App\Http\Controllers;

use App\Model\Alumno;
use App\model\AntecedesntesHereditarios;
use App\model\Detectado;
use App\model\Enfermedades;
use App\model\InfSalud;
use App\model\Inscripciones;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;


class PdfController extends Controller
{

    public function createPdf(Request $request, $folioId, $inscripcionId)
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
        $pdfOk = true;
//                return view('inscripcion.confirmation_pdf', [
//                    'alumno' => $alumno,
//                    'salud' => $inf_salud,
//                    'enfermedades' => $enfermedades,
//                    'antecedentes' => $antecedentes,
//                    'detectado' => $detectado,
//                    'inscripcion' => $inscripcion,
//                    'pdfOk' => $pdfOk
//                ]);

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

    }
}

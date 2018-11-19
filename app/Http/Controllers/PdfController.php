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

    public function createPdf(Request $request)
    {
        $alumno = \Session::get('alumno');
        $inf_salud = \Session::get('salud')['infSalud'];
        $enfermedades = \Session::get('salud')['enfermedades'];
        $detectado = \Session::get('salud')['detectado'];
        $antecedentes = \Session::get('salud')['antecedente'];
        $padre = \Session::get('padres')['padre'];
        $madre = \Session::get('padres')['madre'];
        $emergencia = \Session::get('emergencia');
        $familia = \Session::get('familia');
        $eventos = \Session::get('eventos');
        $personasAut = \Session::get('personasAut');
        $inscripcion = Inscripciones::find(1);
        $enfermedades->especifique = "si";
        return $this->finalSave($alumno, $inf_salud, $enfermedades, $antecedentes, $detectado, $inscripcion);
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

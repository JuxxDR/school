<?php

namespace App\Http\Controllers\Tutor;

use App\Model\Alumno;
use App\Model\Evaluacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporteController extends Controller
{
    public function generaPDF(Request $request)
    {
        $alumno = $request->input('alumno_id');
        $student = Alumno::find($alumno);
        $evaluaciones = Evaluacion::where('alumno_id',$alumno)->get();
        $view =  \View::make('evaluacion', compact('evaluaciones','student'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Reporte de Evaluacion-'.$alumno.'.pdf');
    }
}

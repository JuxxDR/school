<?php

namespace App\Http\Controllers\Tutor;

use App\Model\Alumno;
use App\Model\Asistencia;
use App\Model\EntregaTarea;
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
        $inasistencias = count(Asistencia::where('alumno_id',$alumno)->where('asistio','no')->get());
        $total_dias = count(Asistencia::where('alumno_id',$alumno)->get());
        $aceptable = count(EntregaTarea::where('alumno_id',$alumno)->where('entrego',1)->get());
        $medio = count(EntregaTarea::where('alumno_id',$alumno)->where('entrego',2)->get());
        $deficiente = count(EntregaTarea::where('alumno_id',$alumno)->where('entrego',3)->get());
        $no_entrego = count(EntregaTarea::where('alumno_id',$alumno)->where('entrego',4)->get());
        $view =  \View::make('evaluacion', compact('evaluaciones','student','inasistencias','aceptable','medio','deficiente','no_entrego','total_dias'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Reporte de Evaluacion-'.$alumno.'.pdf');
    }
}

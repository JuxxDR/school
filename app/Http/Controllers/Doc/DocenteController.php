<?php

namespace App\Http\Controllers\Doc;

use App\Model\Alumno;
use App\Model\Docente;
use App\Model\Evaluacion;
use App\Model\Grupo;
use App\Model\GrupoAlumno;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('docente.index');
    }

    public function account()
    {
        return view('docente.cuenta');
    }

    public function cambioContraseña(Request $request)
    {
        $this->validate($request, [
            'contraseña_nueva' => 'required',
            'contraseña_confirmar' => 'required',
        ], [
            "contraseña_nueva.required" => "La fecha no es valida",
            "contraseña_confirmar.required" => "La fecha no es valida",
        ]);

        if ($request->input('contraseña_nueva') != $request->input('contraseña_confirmar')) {
            return back()->with('notification', 'La contraseñas no coinciden');
        } else {
            $user_id = auth()->user()->id;
            $docente = Docente::find($user_id);
            $docente->password = bcrypt($request->input('contraseña_nueva'));
            $docente->save();
            return back()->with('information', 'La contraseña ha sido cambiada satisfactoriamente.');
        }
    }

    public function reportes()
    {
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        $evaluaciones = "no";
        return view('docente.reporte.index')->with(compact('students', 'evaluaciones'));
    }

    public function buscarReporteAlumno(Request $request)
    {
        $alumno_id = $request->input('alumnos');
        $evaluations = Evaluacion::where('alumno_id', $request->input('alumnos'))->get();
        $trimestre = $request->input('trimestre');
        if (count($evaluations) > 0) {
            $evaluacion1 = "";
            $evaluacion2 = "";
            $evaluacion3 = "";
            $evaluacion4 = "";
            $evaluacion5 = "";
            $evaluacion1 = $evaluations->where('materia_id', 1)->where('trimestre', $trimestre)->first();
            if ($evaluacion1)
                $evaluacion1 = $evaluacion1->evaluacion;
            $evaluacion2 = $evaluations->where('materia_id', 2)->where('trimestre', $trimestre)->first();
            if ($evaluacion2)
                $evaluacion2 = $evaluacion2->evaluacion;
            $evaluacion3 = $evaluations->where('materia_id', 3)->where('trimestre', $trimestre)->first();
            if ($evaluacion3)
                $evaluacion3 = $evaluacion3->evaluacion;
            $evaluacion4 = $evaluations->where('materia_id', 4)->where('trimestre', $trimestre)->first();
            if ($evaluacion4)
                $evaluacion4 = $evaluacion4->evaluacion;
            $evaluacion5 = $evaluations->where('materia_id', 5)->where('trimestre', $trimestre)->first();
            if ($evaluacion5)
                $evaluacion5 = $evaluacion5->evaluacion;
            return view('docente.reporte.edit')->with(compact('evaluacion1', 'evaluacion2', 'evaluacion3', 'evaluacion4', 'evaluacion5', 'alumno_id', 'trimestre'));
        }else{
            return view('docente.reporte.create')->with(compact('alumno_id','trimestre'));
        }
    }

    public function guardarReporte(Request $request)
    {
        $evaluacion = new Evaluacion();
        $evaluacion->trimestre = $request->input('trimestre');
        $evaluacion->alumno_id = $request->input('alumno_id');
        $evaluacion->evaluacion = $request->input('lenguaje');
        $evaluacion->materia_id = 1;
        $evaluacion->save();

        $evaluacion = new Evaluacion();
        $evaluacion->trimestre = $request->input('trimestre');
        $evaluacion->alumno_id = $request->input('alumno_id');
        $evaluacion->evaluacion = $request->input('matematico');
        $evaluacion->materia_id = 2;
        $evaluacion->save();

        $evaluacion = new Evaluacion();
        $evaluacion->trimestre = $request->input('trimestre');
        $evaluacion->alumno_id = $request->input('alumno_id');
        $evaluacion->evaluacion = $request->input('exploracion');
        $evaluacion->materia_id = 3;
        $evaluacion->save();

        $evaluacion = new Evaluacion();
        $evaluacion->trimestre = $request->input('trimestre');
        $evaluacion->alumno_id = $request->input('alumno_id');
        $evaluacion->evaluacion = $request->input('fisico');
        $evaluacion->materia_id = 4;
        $evaluacion->save();

        $evaluacion = new Evaluacion();
        $evaluacion->trimestre = $request->input('trimestre');
        $evaluacion->alumno_id = $request->input('alumno_id');
        $evaluacion->evaluacion = $request->input('social');
        $evaluacion->materia_id = 5;
        $evaluacion->save();

        return redirect(route('docente_reportes'))->with('notification', 'Se registro correctamente la evaluación');
    }

    public function modificarReporte(Request $request){
        $evaluacion = Evaluacion::where('materia_id',1)->where('alumno_id',$request->input('alumno_id'))->where('trimestre',$request->input('trimestre'))->first();
        $evaluacion->evaluacion = $request->input('lenguaje');
        $evaluacion->save();

        $evaluacion = Evaluacion::where('materia_id',2)->where('alumno_id',$request->input('alumno_id'))->where('trimestre',$request->input('trimestre'))->first();
        $evaluacion->evaluacion = $request->input('matematico');
        $evaluacion->save();

        $evaluacion = Evaluacion::where('materia_id',3)->where('alumno_id',$request->input('alumno_id'))->where('trimestre',$request->input('trimestre'))->first();
        $evaluacion->evaluacion = $request->input('exploracion');
        $evaluacion->save();

        $evaluacion = Evaluacion::where('materia_id',4)->where('alumno_id',$request->input('alumno_id'))->where('trimestre',$request->input('trimestre'))->first();
        $evaluacion->evaluacion = $request->input('fisico');
        $evaluacion->save();

        $evaluacion = Evaluacion::where('materia_id',5)->where('alumno_id',$request->input('alumno_id'))->where('trimestre',$request->input('trimestre'))->first();
        $evaluacion->evaluacion = $request->input('social');
        $evaluacion->save();

        return redirect(route('docente_reportes'))->with('notification', 'Se actualizo correctamente la evaluación');
    }

    public function PDFReporteAlumno($id){
        $student = Alumno::find($id);
        $evaluaciones = Evaluacion::where('alumno_id',$id)->get();
        $view =  \View::make('evaluacion', compact('evaluaciones','student'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Reporte de Evaluacion-'.$id.'.pdf');
    }

}

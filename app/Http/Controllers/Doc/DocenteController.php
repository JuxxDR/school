<?php

namespace App\Http\Controllers\Doc;

use App\Model\Alumno;
use App\Model\Asistencia;
use App\Model\Docente;
use App\Model\EntregaTarea;
use App\Model\Evaluacion;
use App\Model\Grupo;
use App\Model\GrupoAlumno;
use App\Model\Tarea;
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
            'contraseña_nueva' => 'required|max:20|min:8',
            'contraseña_confirmar' => 'required',
        ], [
            "contraseña_nueva.required" => "La contraseña no es valida",
            'contraseña_confirmar.required' => 'Debes confirmar la contraseña',
            'contraseña_nueva.min' => 'La contraseña no cumple con los requisitos minimos, introduce una de por lo menos 8 caracteres',
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
        if(count(Grupo::all())>0){
            $user_id = auth()->user()->id;
            $group_id = Grupo::where('docente_id', $user_id)->first();
            $group_id = $group_id->id;
            $students = GrupoAlumno::where('grupo_id', $group_id)->get();
            $evaluaciones = "no";
            return view('docente.reporte.index')->with(compact('students', 'evaluaciones'));
        }else{
            return redirect(route('docente_inicio'));
        }
    }

    public function buscarReporteAlumno(Request $request)
    {
        if($request->input('alumnos')==0){
            return back()->with('warning_reporte','Selecciona un alumno');
        }
        if($request->input('trimestre')==0){
            return back()->with('warning_reporte','Selecciona un trimestre');
        }
        $alumno_id = $request->input('alumnos');
        $evaluations = Evaluacion::where('alumno_id', $request->input('alumnos'))->get();
        $trimestre = $request->input('trimestre');
        $evalua = Evaluacion::where('alumno_id', $request->input('alumnos'))->where('trimestre',$trimestre)->get();
        if (count($evalua) > 0) {
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
        $inasistencias = count(Asistencia::where('alumno_id',$id)->where('asistio','no')->get());
        $total_dias = count(Asistencia::where('alumno_id',$id)->get());
        $aceptable = count(EntregaTarea::where('alumno_id',$id)->where('entrego',1)->get());
        $medio = count(EntregaTarea::where('alumno_id',$id)->where('entrego',2)->get());
        $deficiente = count(EntregaTarea::where('alumno_id',$id)->where('entrego',3)->get());
        $no_entrego = count(EntregaTarea::where('alumno_id',$id)->where('entrego',4)->get());
        $view =  \View::make('evaluacion', compact('evaluaciones','student','inasistencias','aceptable','medio','deficiente','no_entrego','total_dias'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Reporte de Evaluacion-'.$id.'.pdf');
    }

}

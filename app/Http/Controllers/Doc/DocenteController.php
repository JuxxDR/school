<?php

namespace App\Http\Controllers\Doc;

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

    public function reportes(){
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        $evaluaciones = "no";
        return view('docente.reporte.index')->with(compact('students','evaluaciones'));
    }

    public function buscarReporteAlumno(Request $request){
        $alumno_id = $request->input('alumnos');
        $evaluations=Evaluacion::where('alumno_id',$request->input('alumnos'))->get();
        $evaluacion1="";
        $evaluacion2="";
        $evaluacion3="";
        $evaluacion4="";
        $evaluacion5="";
        $evaluacion1=$evaluations->where('materia_id',1)->where('trimestre',1)->first();
        if ($evaluacion1)
            $evaluacion1=$evaluacion1->evaluacion;
        $evaluacion2=$evaluations->where('materia_id',2)->where('trimestre',1)->first();
        if ($evaluacion2)
            $evaluacion2=$evaluacion2->evaluacion;
        $evaluacion3=$evaluations->where('materia_id',3)->where('trimestre',1)->first();
        if ($evaluacion3)
            $evaluacion3=$evaluacion3->evaluacion;
        $evaluacion4=$evaluations->where('materia_id',4)->where('trimestre',1)->first();
        if ($evaluacion4)
            $evaluacion4=$evaluacion4->evaluacion;
        $evaluacion5=$evaluations->where('materia_id',5)->where('trimestre',1)->first();
        if ($evaluacion5)
            $evaluacion5=$evaluacion5->evaluacion;
        return view('docente.reporte.edit')->with(compact('evaluacion1','evaluacion2','evaluacion3','evaluacion4','evaluacion5','alumno_id'));
    }
}

<?php

namespace App\Http\Controllers\Doc;

use App\Model\Alumno;
use App\Model\Asistencia;
use App\model\DiaAsistencia;
use App\Model\Docente;
use App\Model\Grupo;
use App\Model\GrupoAlumno;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AsistenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        $numero_alumnos=0;
        foreach ($students as $alumnos) {
            $numero_alumnos++;
        }
        $realizada = DiaAsistencia::where('fecha_entrega', date('Y-m-d'))->where('docente_id',$user_id)->first();
        if ($realizada) {
            $realizada = DiaAsistencia::where('fecha_entrega', date('Y-m-d'))->first()->realizada;
        } else {
            $realizada = 0;
        }
        $docente=Docente::find(auth()->user()->id);
        $fechas=DiaAsistencia::where('docente_id',$docente->id)->get();
        return view('docente.asistencia.index')->with(compact('students', 'realizada','docente','numero_alumnos','fechas'));
    }

    public function asistio($id)
    {
        $student = new Asistencia();
        $student->alumno_id = $id;
        $student->asistio = 'si';
        $student->fecha = date('Y-m-d');
        $student->save();
        return back()->with('confirmation', 'El alumno ' . $student->alumnoAsistencia->nombre . ' ' . $student->alumnoAsistencia->apellidoP . ' ' . $student->alumnoAsistencia->apellidoM . ' asistio a clase');
    }

    public function noAsistio($id)
    {
        $student = new Asistencia();
        $student->alumno_id = $id;
        $student->asistio = 'no';
        $student->fecha = date('Y-m-d');
        $student->save();
        return back()->with('confirmation', 'El alumno ' . $student->alumnoAsistencia->nombre . ' ' . $student->alumnoAsistencia->apellidoP . ' ' . $student->alumnoAsistencia->apellidoM . ' no asistio a clase');
    }

    public function delete($id)
    {
        $user = Asistencia::where('alumno_id', $id)->where('fecha', date('Y-m-d'));
        $user->delete();
        return back();
    }

    public function guardar()
    {
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();

        foreach ($students as $student) {
            if (!Asistencia::where('alumno_id', $student->alumno_id)->where('fecha', date('Y-m-d'))->first()) {
                return back()->with('notification', 'No se ha registrado asistencia de todos los alumnos');
            }
        }

        $valor = new DiaAsistencia();
        $valor->fecha_entrega = date('Y-m-d');
        $valor->realizada = 1;
        $valor->docente_id = $user_id;
        $valor->save();
        return back()->with('confirmation', 'Se ha registrado lista correctamente');
    }

    public function consultaFecha(Request $request){
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first()->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        $fecha_elegida = $request->input('fecha');
        return view('docente.asistencia.consulta')->with(compact('students','fecha_elegida'));
    }

    public function descargaPDF(Request $request){
        $docente=Docente::find(auth()->user()->id);
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first()->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        $fecha_elegida = $request->input('fecha');
        $numero_alumnos=0;
        foreach ($students as $alumnos) {
            $numero_alumnos++;
        }
        $view =  \View::make('docente.asistencia.registro', compact('students', 'fecha_elegida','docente','numero_alumnos'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('Asistencia-'.$fecha_elegida.'.pdf');
    }

    public function registro(Request $request)
    {
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        foreach ($students as $student) {
            $entrega = new Asistencia();
            $entrega->alumno_id = $student->alumno_id;
            $asistio="";
            if ($request->input('asistencia' . $student->alumno_id)== 1){
                $asistio="si";
            }else{
                $asistio="no";
            }
            $entrega->asistio = $asistio;
            $entrega->fecha = date('Y-m-d');
            $entrega->save();
        }
        $valor = new DiaAsistencia();
        $valor->fecha_entrega = date('Y-m-d');
        $valor->realizada = 1;
        $valor->docente_id = $user_id;
        $valor->save();
        return back()->with('confirmation', 'Se ha registrado lista correctamente');
    }

}
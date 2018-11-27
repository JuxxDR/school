<?php

namespace App\Http\Controllers\Doc;

use App\Charts\SampleChart;
use App\Model\Docente;
use App\Model\EntregaTarea;
use App\Model\Grupo;
use App\Model\GrupoAlumno;
use App\Model\Tarea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = auth()->user()->grupo->tareas;

        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        return view('docente.tarea.index')->with(compact('tareas', 'students'));
    }

    public function entrega($id_tarea)
    {
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        $tarea = Tarea::find($id_tarea);
        return view('docente.tarea.edit')->with(compact('students', 'tarea'));
    }

    public function create(Request $request)
    {
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $this->validate($request, [
            'name' => 'required',
            'start' => 'required|date',
            'descripcion' => 'required',
        ], [
            "name.required" => "La tarea no tiene titulo.",
            "start.required" => "La fecha no es valida",
            "start.date" => "La fecha no es valida",
            "descripcion.required" => "La descripcion no puede ir vacia, debes introducir algo.",
        ]);
        $tarea = new Tarea();
        $tarea->descripcion = $request->input('descripcion');
        $tarea->nombre = $request->input('name');
        $tarea->fecha_entrega = $request->input('start');
        $tarea->grupo_id = $group_id;
        $tarea->save();
        $tareas = auth()->user()->grupo->tareas;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        return view('docente.tarea.index')->with(compact('tareas', 'students'));
    }

    public function registro(Request $request)
    {
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        foreach ($students as $student) {
            if ($request->input('entrega' . $student->alumno_id)==0){
                return back()->with('warning_tarea','Registra la entrega de todos los alumnos');
            }
        }
        foreach ($students as $student) {
            $entrega = new EntregaTarea();
            $entrega->alumno_id = $student->alumno_id;
            $entrega->entrego = $request->input('entrega' . $student->alumno_id);
            $entrega->tarea_id = $request->input('tarea_id');
            $entrega->save();
        }
        return back()->with('confirmation', 'Tarea Registrada');
    }

    public function descargaPDF(Request $request)
    {
        $user_id = auth()->user()->id;
        $docente = Docente::find($user_id);
        $group_id = Grupo::where('docente_id', $user_id)->first()->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        $tarea_id = $request->input('tarea_id');
        $tarea = Tarea::find($tarea_id);
        $numero_alumnos = 0;
        $aceptable = 0;
        $medio = 0;
        $deficiente = 0;
        $no_entregado = 0;
        foreach ($students as $alumnos) {
            $numero_alumnos++;
        }
        $view = \View::make('docente.tarea.registro', compact('students', 'tarea', 'docente', 'numero_alumnos', 'aceptable', 'medio','deficiente','no_entregado'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Tarea-' . $tarea_id . '.pdf');
    }
}

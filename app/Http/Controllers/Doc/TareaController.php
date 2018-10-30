<?php

namespace App\Http\Controllers\Doc;

use App\Model\Grupo;
use App\Model\GrupoAlumno;
use App\Model\Tarea;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TareaController extends Controller
{
    public function index(){
        $tareas=auth()->user()->grupo->tareas;
        return view('docente.tarea.index')->with(compact('tareas'));
    }

    public function entrega($id_tarea){
        $user_id = auth()->user()->id;
        $group_id = Grupo::where('docente_id', $user_id)->first();
        $group_id = $group_id->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        $tarea=Tarea::find($id_tarea);
        return view('docente.tarea.edit')->with(compact('students','tarea'));
    }

    public function create(Request $request){
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
        $tareas=auth()->user()->grupo->tareas;
        return view('docente.tarea.index')->with(compact('tareas'));
    }
}

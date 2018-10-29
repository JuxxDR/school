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
}

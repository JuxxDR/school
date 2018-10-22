<?php

namespace App\Http\Controllers\Doc;

use App\Model\Alumno;
use App\Model\Asistencia;
use App\model\DiaAsistencia;
use App\Model\Grupo;
use App\Model\GrupoAlumno;
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
        $group_id = Grupo::where('docente_id',$user_id)->first();
        $group_id=$group_id->id;
        $students = GrupoAlumno::where('grupo_id',$group_id)->get();
        $chidos=DiaAsistencia::where('fecha_entrega',date('Y-m-d'))->first();
        if ($chidos){
            $chidos=DiaAsistencia::where('fecha_entrega',date('Y-m-d'))->first()->realizada;
        }else{
            $chidos=0;
        }
        return view('docente.asistencia.index')->with(compact('students','chidos'));
    }

    public function asistio($id)
    {
        $student = new Asistencia();
        $student->alumno_id = $id;
        $student->asistio = 'si';
        $student->fecha = date('Y-m-d');
        $student->save();
        return back()->with('notification', 'Usuario registrado satisfactoriamente');
    }

    public function noAsistio($id)
    {
        $student = new Asistencia();
        $student->alumno_id = $id;
        $student->asistio = 'no';
        $student->fecha = date('Y-m-d');
        $student->save();
        return back()->with('notification', 'Usuario registrado satisfactoriamente');
    }

    public function delete($id)
    {
        $user = Asistencia::where('alumno_id',$id)->where('fecha',date('Y-m-d'));
        $user->delete();
        return back();
    }

    public function guardar()
    {
        $valor = new DiaAsistencia();
        $valor->fecha_entrega=date('Y-m-d');
        $valor->realizada=1;
        $valor->save();
        return back();
    }
}
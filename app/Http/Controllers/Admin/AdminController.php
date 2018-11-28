<?php

namespace App\Http\Controllers\Admin;

use App\Model\Alumno;
use App\model\DiaAsistencia;
use App\Model\Docente;
use App\Model\Grupo;
use App\Model\GrupoAlumno;
use App\Model\Tarea;
use App\model\Trimestre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Comment\Doc;
use function Sodium\add;

class AdminController extends Controller
{
    public function notifications()
    {
        $grupos = Grupo::all();
        return view('admin.notificar')->with(compact('grupos'));
    }

    public function docentes()
    {
        $docentes = Docente::whereRole(1)->get();
        return view('admin.docente')->with(compact('docentes'));
    }

    public function reportes()
    {
        $grupos = Grupo::all();
        return view('admin.reporte')->with(compact('grupos'));
    }

    public function grupos()
    {
        $grupos = Grupo::all();
        return view('admin.grupo')->with(compact('grupos'));
    }

    public function actualizarDocente(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
        ], [
            "email.required" => "Debes introducir un email",
            "email.email" => "Debes introducir un email valido"
        ]);
        $id = $request->input('docente_id');
        $docente = Docente::find($id);
        $docente->email = $request->input('email');
        $user_pass = $request->input('password');
        if ($user_pass)
            $docente->password = bcrypt($user_pass);
        $docente->save();
        return back()->with('notification', 'Docente actualizado');
    }

    public function crearDocente(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'password2' => 'required',
            'email2' => 'required|email',
        ], [
            "name.required" => "Debes introducir un nombre",
            "apellidoP.required" => "Debes introducir apellidos",
            "apellidoM.required" => "Debes introducir apellidos",
            "password2.required" => "Debes introducir contraseña",
            "email2.required" => "Debes introducir un email",
            "email2.email" => "Debes introducir un email valido"
        ]);
        $docente = new Docente();
        $docente->nombre = $request->input('name');
        $docente->apellidoM = $request->input('apellidoM');
        $docente->apellidoP = $request->input('apellidoP');
        $docente->email = $request->input('email2');
        $docente->password = bcrypt($request->input('password2'));
        $docente->role = 1;
        $docente->save();
        return back()->with('notification_crear', 'Docente creado');
    }

    public function habilitarPrimer()
    {
        $trimestre = new Trimestre();
        $trimestre->trimestre = 1;
        $trimestre->save();
        return back()->with('notification', 'El primer trimestre ha sido habilitado');
    }

    public function habilitarSegundo()
    {
        $trimestre = new Trimestre();
        $trimestre->trimestre = 2;
        $trimestre->save();
        return back()->with('notification', 'El segundo trimestre ha sido habilitado');
    }

    public function habilitarTercer()
    {
        $trimestre = new Trimestre();
        $trimestre->trimestre = 3;
        $trimestre->save();
        return back()->with('notification', 'El tercer trimestre ha sido habilitado');
    }

    public function deleteDocente($id)
    {
        $docente = Docente::find($id);
        if (count(Grupo::where('docente_id', $docente->id)->get()) == 0) {
            $docente->delete();
            return back();
        }
        return back()->with('warning', 'El docente seleccionado tiene un grupo asignado, no se puede eliminar');
    }

    public function crearGrupos()
    {
        if (count(Docente::where('role', 1)->get()) >= 3) {
            if (count(Alumno::all()) > 0) {
                $primerGrado = Alumno::where('grado', 1)->get();
                $segundoGrado = Alumno::where('grado', 2)->get();
                $tercerGrado = Alumno::where('grado', 3)->get();
                if (count($primerGrado) == 0 || count($segundoGrado) == 0 || count($tercerGrado) == 0) {
                    return back()->with('warning', 'No hay alumnos inscritos en los 3 grados');
                } else {
                    $docente = Docente::where('role', 1)->get();
                    $mayor = 0;
                    if (count($docente) % 3 == 0) {
                        $grupo1 = count($docente) / 3;
                        $grupo2 = count($docente) / 3;
                        $grupo3 = count($docente) / 3;
                    } else if (count($docente) % 3 == 1) {
                        if (count($primerGrado) > count($segundoGrado)) {
                            if (count($primerGrado) > count($tercerGrado)) {
                                //1mayor
                                $mayor = 1;
                                $grupo1 = floor(count($docente) / 3) + 1;
                                $grupo2 = floor(count($docente) / 3);
                                $grupo3 = floor(count($docente) / 3);
                            } else {
                                //3mayor
                                $mayor = 3;
                                $grupo3 = floor(count($docente) / 3) + 1;
                                $grupo2 = floor(count($docente) / 3);
                                $grupo1 = floor(count($docente) / 3);
                            }
                        } else {
                            if (count($segundoGrado) > count($tercerGrado)) {
                                //2mayor
                                $mayor = 2;
                                $grupo2 = floor(count($docente) / 3) + 1;
                                $grupo1 = floor(count($docente) / 3);
                                $grupo3 = floor(count($docente) / 3);
                            } else {
                                //3mayor
                                $mayor = 3;
                                $grupo3 = floor(count($docente) / 3) + 1;
                                $grupo2 = floor(count($docente) / 3);
                                $grupo1 = floor(count($docente) / 3);
                            }
                        }
                    } else if (count($docente) % 3 == 2) {
                        if (count($primerGrado) < count($segundoGrado)) {
                            if (count($primerGrado) < count($tercerGrado)) {
                                //1mayor
                                $mayor = 1;
                                $grupo1 = floor(count($docente) / 3);
                                $grupo2 = floor(count($docente) / 3) + 1;
                                $grupo3 = floor(count($docente) / 3) + 1;
                            } else {
                                //3mayor
                                $mayor = 3;
                                $grupo3 = floor(count($docente) / 3);
                                $grupo2 = floor(count($docente) / 3) + 1;
                                $grupo1 = floor(count($docente) / 3) + 1;
                            }
                        } else {
                            if (count($segundoGrado) < count($tercerGrado)) {
                                //2mayor
                                $mayor = 2;
                                $grupo2 = floor(count($docente) / 3);
                                $grupo1 = floor(count($docente) / 3) + 1;
                                $grupo3 = floor(count($docente) / 3) + 1;
                            } else {
                                //3mayor
                                $mayor = 3;
                                $grupo3 = floor(count($docente) / 3);
                                $grupo2 = floor(count($docente) / 3) + 1;
                                $grupo1 = floor(count($docente) / 3) + 1;
                            }
                        }
                    }
                    return view('admin.asigna')->with(compact('docente', 'grupo1', 'grupo2', 'grupo3'));
                    //dd(count($primerGrado) . ' ' . count($segundoGrado) . ' ' . count($tercerGrado) . ' Docentes:' . count($docente).' Mayor/Menor:'.$mayor.' Grupo1:'.$grupo1.' Grupo2:'.$grupo2.' Grupo3:'.$grupo3);
                }
            } else {
                return back()->with('warning', 'No hay alumnos inscritos');
            }
        } else {
            return back()->with('warning', 'El numero de docentes registrados en el sistema no cumple con lo establecido, deben ser minimo 3');
        }
    }

    public function asignarGrupos(Request $request)
    {
        $primerGrado = Alumno::where('grado', 1)->get();
        $segundoGrado = Alumno::where('grado', 2)->get();
        $tercerGrado = Alumno::where('grado', 3)->get();

        $lista = array();
        for ($i = 0; $i < $request->input('grupo1'); $i++) {
            array_push($lista, $request->input('docente1' . $i));
        }

        for ($i = 0; $i < $request->input('grupo2'); $i++) {
            array_push($lista, $request->input('docente2' . $i));
        }

        for ($i = 0; $i < $request->input('grupo3'); $i++) {
            array_push($lista, $request->input('docente3' . $i));
        }

        $longitud = count($lista);
        $unicos = array_unique($lista);
        $longitudDeUnicos = count($unicos);
        if($longitudDeUnicos!=$longitud){
            return back()->with('warning', 'Debes seleccionar un docente diferente para cada grupo');
        }

        for ($i = 0; $i < $request->input('grupo1'); $i++) {
            if ($request->input('docente1' . $i) == 0) {
                $grupos = Grupo::all();
                foreach ($grupos as $grupo) {
                    $grupo->delete();
                }
                return back()->with('warning', 'Debes seleccionar un docente para el grupo');
            }
            $group = new Grupo();
            $group->docente_id = $request->input('docente1' . $i);
            $group->aula = $request->input('aula1' . $i);
            $group->grado = 1;
            $group->save();
        }

        for ($i = 0; $i < $request->input('grupo2'); $i++) {
            if ($request->input('docente2' . $i) == 0) {
                $grupos = Grupo::all();
                foreach ($grupos as $grupo) {
                    $grupo->delete();
                }
                return back()->with('warning', 'Debes seleccionar un docente para el grupo');
            }
            $group = new Grupo();
            $group->docente_id = $request->input('docente2' . $i);
            $group->aula = $request->input('aula2' . $i);
            $group->grado = 2;
            $group->save();
        }
        for ($i = 0; $i < $request->input('grupo3'); $i++) {
            if ($request->input('docente3' . $i) == 0) {
                $grupos = Grupo::all();
                foreach ($grupos as $grupo) {
                    $grupo->delete();
                }
                return back()->with('warning', 'Debes seleccionar un docente para el grupo');
            }
            $group = new Grupo();
            $group->docente_id = $request->input('docente3' . $i);
            $group->aula = $request->input('aula3' . $i);
            $group->grado = 3;
            $group->save();
        }


        $aux = Grupo::where('grado', 1)->get()->toArray();
        $length = count($aux);
        $i = 0;
        foreach ($primerGrado as $student) {
            if ($i == $length - 1) {
                $i = 0;
            } else {
                $i = $i + 1;
            }
            $grupoAlumno = new GrupoAlumno();
            $grupoAlumno->grupo_id = $aux[$i]['id'];
            $grupoAlumno->alumno_id = $student->id;
            $grupoAlumno->save();
        }

        $aux = Grupo::where('grado', 2)->get()->toArray();
        $length = count($aux);
        $i = 0;
        foreach ($segundoGrado as $student) {
            if ($i == $length - 1) {
                $i = 0;
            } else {
                $i = $i + 1;
            }
            $grupoAlumno = new GrupoAlumno();
            $grupoAlumno->grupo_id = $aux[$i]['id'];
            $grupoAlumno->alumno_id = $student->id;
            $grupoAlumno->save();
        }

        $aux = Grupo::where('grado', 3)->get()->toArray();
        $length = count($aux);
        $i = 0;
        foreach ($tercerGrado as $student) {
            if ($i == $length - 1) {
                $i = 0;
            } else {
                $i = $i + 1;
            }
            $grupoAlumno = new GrupoAlumno();
            $grupoAlumno->grupo_id = $aux[$i]['id'];
            $grupoAlumno->alumno_id = $student->id;
            $grupoAlumno->save();
        }

        return redirect(route('admin_docentes'))->with('notification', 'Grupos Creados');
    }

    public function grupoDocente($id)
    {
        $fechas = DiaAsistencia::where('docente_id', $id)->get();
        $docente = Docente::find($id);
        $grupo_id = Grupo::where('docente_id', $id)->first()->id;
        $tareas = Tarea::where('grupo_id', $grupo_id)->get();
        $students = GrupoAlumno::where('grupo_id', $grupo_id)->get();
        return view('admin.grupo')->with(compact('students', 'docente', 'fechas', 'tareas'));
    }

    public function descargaAsistenciaPDF(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'not_in:0',
        ], [
            "fecha.not_in" => "Debes seleccionar una fecha",
        ]);
        $docente = Docente::find($request->input('docente_id'));
        $group_id = Grupo::where('docente_id', $docente->id)->first()->id;
        $students = GrupoAlumno::where('grupo_id', $group_id)->get();
        $fecha_elegida = $request->input('fecha');
        $numero_alumnos = 0;
        $si = 0;
        $no = 0;
        foreach ($students as $alumnos) {
            $numero_alumnos++;
        }
        $view = \View::make('docente.asistencia.registro', compact('students', 'fecha_elegida', 'docente', 'numero_alumnos', 'si', 'no'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Asistencia-' . $fecha_elegida . '.pdf');
    }

    public function descargaTareaPDF(Request $request)
    {
        $this->validate($request, [
            'tarea_id' => 'not_in:0',
        ], [
            "tarea_id.not_in" => "Debes seleccionar una tarea",
        ]);
        $user_id = $request->input('docente_id');
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
        $view = \View::make('docente.tarea.registro', compact('students', 'tarea', 'docente', 'numero_alumnos', 'aceptable', 'medio', 'deficiente', 'no_entregado'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('Tarea-' . $tarea_id . '.pdf');
    }
}

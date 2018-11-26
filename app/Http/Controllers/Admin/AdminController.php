<?php

namespace App\Http\Controllers\Admin;

use App\Model\Alumno;
use App\Model\Docente;
use App\Model\Grupo;
use App\Model\GrupoAlumno;
use App\model\Trimestre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PhpParser\Comment\Doc;

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
        $primerGrado = Alumno::where('grado', 1)->get();
        $segundoGrado = Alumno::where('grado', 2)->get();
        $tercerGrado = Alumno::where('grado', 3)->get();

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

    public function asignarGrupos(Request $request)
    {
        $primerGrado = Alumno::where('grado', 1)->get();
        $segundoGrado = Alumno::where('grado', 2)->get();
        $tercerGrado = Alumno::where('grado', 3)->get();

        for ($i = 0; $i < $request->input('grupo1'); $i++) {
            if ($request->input('docente1' . $i) == 0) {
                $grupos = Grupo::all();
                foreach ($grupos as $grupo) {
                    $grupo->delete();
                }
                return back()->with('warning', 'Debes eleccionar un docente para el grupo');
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
                return back()->with('warning', 'Debes eleccionar un docente para el grupo');
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
                return back()->with('warning', 'Debes eleccionar un docente para el grupo');
            }
            $group = new Grupo();
            $group->docente_id = $request->input('docente3' . $i);
            $group->aula = $request->input('aula3' . $i);
            $group->grado = 3;
            $group->save();
        }

        $aux = Grupo::where('grado',1)->get()->toArray();
        $length = count($aux);
        $i=0;
        foreach ($primerGrado as $student) {
            if ($i==$length-1){
                $i=0;
            }else{
                $i=$i+1;
            }
            $grupoAlumno = new GrupoAlumno();
            $grupoAlumno->grupo_id=$aux[$i]['id'];
            $grupoAlumno->alumno_id=$student->id;
            $grupoAlumno->save();
        }

        $aux = Grupo::where('grado',2)->get()->toArray();
        $length = count($aux);
        $i=0;
        foreach ($segundoGrado as $student) {
            if ($i==$length-1){
                $i=0;
            }else{
                $i=$i+1;
            }
            $grupoAlumno = new GrupoAlumno();
            $grupoAlumno->grupo_id=$aux[$i]['id'];
            $grupoAlumno->alumno_id=$student->id;
            $grupoAlumno->save();
        }

        $aux = Grupo::where('grado',3)->get()->toArray();
        $length = count($aux);
        $i=0;
        foreach ($tercerGrado as $student) {
            if ($i==$length-1){
                $i=0;
            }else{
                $i=$i+1;
            }
            $grupoAlumno = new GrupoAlumno();
            $grupoAlumno->grupo_id=$aux[$i]['id'];
            $grupoAlumno->alumno_id=$student->id;
            $grupoAlumno->save();
        }

        return redirect(route('admin_docentes'))->with('notification', 'Grupos Creados');
    }
}

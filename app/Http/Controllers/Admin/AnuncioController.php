<?php

namespace App\Http\Controllers\Admin;

use App\Mail\NotificacionesEspecificas;
use App\Mail\NotificacionesGenerales;
use App\Mail\NotificacionesGrupo;
use App\Model\Alumno;
use App\Model\Anuncio;
use App\Model\AnuncioEspecifico;
use App\model\AnuncioGeneral;
use App\model\Familias;
use App\Model\Grupo;
use App\Model\GrupoAlumno;
use App\model\Padre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AnuncioController extends Controller
{
    public function general(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'importancia' => 'in:1,2,3',
            'descripcion' => 'required',
        ], [
            "titulo.required" => "El anuncio no tiene titulo.",
            "importancia.in" => "El nivel de importancia no es valido.",
            "descripcion.required" => "La descripcion no puede ir vacia, debes introducir algo.",
        ]);
        $anuncio = new AnuncioGeneral();
        $anuncio->nombre = $request->input('titulo');
        $anuncio->informacion = $request->input('descripcion');
        $anuncio->importancia = $request->input('importancia');
        $anuncio->observaciones = $request->input('observaciones');
        $anuncio->save();
        $call = AnuncioGeneral::find($anuncio->id);
        $receivers = Padre::all();
        foreach ($receivers as $padre) {
            $familia = Familias::where('id', $padre->familia_id)->first();
            $student = Alumno::where('id', $familia->alumno_id)->first();
            if ($padre->email) {
                Mail::to($padre->email)->send(new NotificacionesGenerales($call, $student));//swift mailer
            }
        }
        return back()->with('notification', 'Anuncio publicado satisfactoriamente');
    }

    public function grupo(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'grupo' => 'required|not_in:0',
            'importancia' => 'in:1,2,3',
            'descripcion' => 'required',
        ], [
            "titulo.required" => "El anuncio no tiene titulo.",
            "importancia.in" => "El nivel de importancia no es valido.",
            "descripcion.required" => "La descripcion no puede ir vacia, debes introducir algo.",
            'grupo.not_in' => 'Selecciona un grupo'
        ]);
        $anuncio = new Anuncio();
        $anuncio->grupo_id = $request->input('grupo');
        $anuncio->nombre = $request->input('titulo');
        $anuncio->informacion = $request->input('descripcion');
        $anuncio->importancia = $request->input('importancia');
        $anuncio->observaciones = $request->input('observaciones');
        $anuncio->save();
        $call = Anuncio::find($anuncio->id);
        $alumnos = GrupoAlumno::where('grupo_id', $call->grupo_id)->get();
        foreach ($alumnos as $alumno) {
            $familia = Familias::where('alumno_id', $alumno->alumno_id)->first();
            $padre = Padre::where('familia_id', $familia->id)->first();
            if ($padre->email) {
                Mail::to($padre->email)->send(new NotificacionesGrupo($call, Alumno::where('id', $alumno->alumno_id)->first()));//swift mailer
            }
        }
        return back()->with('notification', 'Anuncio publicado satisfactoriamente');
    }

    public function alumno(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'importancia' => 'in:1,2,3',
            'descripcion' => 'required',
            'student_id' => 'required|not_in:0'
        ], [
            "titulo.required" => "El anuncio no tiene titulo.",
            "importancia.in" => "El nivel de importancia no es valido.",
            "descripcion.required" => "La descripcion no puede ir vacia, debes introducir algo.",
            "student_id.not_in" => "Selecciona un alumno"
        ]);
        $anuncio = new AnuncioEspecifico();
        $anuncio->alumno_id = $request->input('student_id');
        $anuncio->nombre = $request->input('titulo');
        $anuncio->informacion = $request->input('descripcion');
        $anuncio->importancia = $request->input('importancia');
        $anuncio->observaciones = $request->input('observaciones');
        $anuncio->save();

        $familia_id = Familias::where('alumno_id', $anuncio->alumno_id)->first()->id;
        $padres = Padre::where('familia_id', $familia_id)->get();
        foreach ($padres as $padre) {
            if ($padre->email) {
                Mail::to($padre->email)->send(new NotificacionesEspecificas($anuncio, Alumno::where('id', $anuncio->alumno_id)->first()));//swift mailer
            }
        }
        return back()->with('notification', 'Anuncio publicado satisfactoriamente');
    }

    public function obtenerAnuncios()
    {
        $anuncios = AnuncioGeneral::all();
        $anuncios_especificos = AnuncioEspecifico::all();
        $anuncios_grupales = Anuncio::all();
        return view('admin.historial')->with(compact('anuncios', 'anuncios_especificos', 'anuncios_grupales'));
    }
}

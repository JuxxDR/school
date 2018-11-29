<?php

namespace App\Http\Controllers\Tutor;

use App\Model\Alumno;
use App\Model\Anuncio;
use App\Model\AnuncioEspecifico;
use App\model\AnuncioGeneral;
use App\Model\Grupo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    public function index()
    {
        if (!auth()->check()) {
            return view('padre.login');
        } else {
            return back();
        }
    }

    public function postLogin(Request $request)
    {
        $this->validate($request, [
            'numero_control' => 'required',
            'password' => 'required',
        ], [
            "numero_control.required" => "Debes introducir un email",
            "password.required" => "Debes introducir un email",
        ]);
        $tutor = Alumno::where('no_control', $request->input('numero_control'))->first();
        if (count(Grupo::all()) >= 3) {
            if ($tutor) {
                if ($tutor->password == $request->input('password')) {
                    $anuncios_generales = AnuncioGeneral::all();
                    $anuncios_especificos = AnuncioEspecifico::where('alumno_id', $tutor->id)->get();
                    $anuncios_grupales = Anuncio::where('grupo_id', $tutor->grupoAlumno->first()->grupo->id)->get();
                    return view('padre.index')->with(compact('tutor', 'anuncios_generales', 'anuncios_especificos', 'anuncios_grupales'));
                }
            }
            return view('padre.login');
        }else{
            return redirect(route('welcome'));
        }
    }

    public function logOut()
    {

    }
}

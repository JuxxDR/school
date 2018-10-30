<?php

namespace App\Http\Controllers\Admin;

use App\Model\Docente;
use App\Model\Grupo;
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
        $id=$request->input('docente_id');
        $docente=Docente::find($id);
        $docente->email=$request->input('email');
        $user_pass=$request->input('password');
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
}

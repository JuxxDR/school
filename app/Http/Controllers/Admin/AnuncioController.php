<?php

namespace App\Http\Controllers\Admin;

use App\Mail\NotificacionesGenerales;
use App\Model\Alumno;
use App\Model\Anuncio;
use App\model\AnuncioGeneral;
use App\model\Familia;
use App\Model\Grupo;
use App\model\Padre;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AnuncioController extends Controller
{
    public function general(Request $request){
        $this->validate($request, [
            'titulo' => 'required',
            'importancia' => 'in:1,2,3',
            'descripcion' => 'required',
        ], [
            "titulo.required" => "El anuncio no titulo.",
            "importancia.in" => "El nivel de importancia no es valida.",
            "descripcion.required" => "La descripcion no puede ir vacia, debes introducir algo.",
        ]);
        $anuncio = new AnuncioGeneral();
        $anuncio->nombre = $request->input('titulo');
        $anuncio->informacion = $request->input('descripcion');
        $anuncio->importancia = $request->input('importancia');
        $anuncio->observaciones=$request->input('observaciones');
        $anuncio->save();
        $call=AnuncioGeneral::find($anuncio->id);
        $receivers = Padre::all();
        foreach ($receivers as $padre){
            $familia=Familia::where('id',$padre->familia_id)->first();
            $student=Alumno::where('id',$familia->alumno_id)->first();
            Mail::to($padre->email)->send(new NotificacionesGenerales($call,$student));
        }
        return back()->with('notification', 'Anuncio publicado');
    }
}

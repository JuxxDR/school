<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 02:37 PM
 */

namespace App\Http\Controllers;


use App\Http\Request\CheckFolioRequest;
use App\Http\Request\CreateAlumnoRequest;
use App\Http\Request\CreateEmergenciaRequest;
use App\Http\Request\CreateEventosRequest;
use App\Http\Request\CreateIntegracionRequest;
use App\Http\Request\CreatePadresRequest;
use App\Http\Request\CreatePersonasAutRequest;
use App\Http\Request\CreateSaludRequest;
use App\Model\Alumno;
use App\model\AntecedesntesHereditarios;
use App\model\Detectado;
use App\model\Emergencia;
use App\model\Enfermedades;
use App\model\Eventos;
use App\model\Familias;
use App\model\Folios;
use App\model\InfSalud;
use App\model\Inscripciones;
use App\model\Padre;
use App\model\PersonasAut;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

use Barryvdh\DomPDF\Facade as PDF;

class InscripcionController extends Controller
{
    public function folio()
    {
        return view('inscripcion.folio');
    }

    public function folioPost(CheckFolioRequest $request)
    {
        $folio = Folios::whereFolio($request->input('folio'))->first();
        $inscripcion = new Inscripciones();
        $inscripcion->folio_id = $folio->id;
        $inscripcion->save();
        return redirect()->route('inscripcion_datos_alumno', ['inscripcion' => $inscripcion, 'folio' => $folio]);
//        return view('inscripcion.inscripcion', ['folio' => $folio, 'inscripcion' => $inscripcion]);
    }

    public function datosAlumno($inscripcionId, $folioId)
    {
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);

        return view('inscripcion.inscripcion',
            [
                'folio' => $folio,
                'inscripcion' => $inscripcion,
                'select' => 1
            ]);
    }

    public function datosAlumnoPost(CreateAlumnoRequest $request, $folioId, $inscripcionId)
    {
        $alumno = new Alumno();
        $alumno->fill($request->all());
        $inscripcion = Inscripciones::find($inscripcionId);
        $folio = Folios::find($inscripcion->folio_id);
        \Session::put('alumno', $alumno);
        return redirect()->route('inscripcion_datos_salud', ['folio' => $folioId, 'inscripcion' => $inscripcionId]);
    }

    public function datosPadres($folioId, $inscripcionId)
    {
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);

        return view('inscripcion.inscripcion',
            [
                'folio' => $folio,
                'inscripcion' => $inscripcion,
                'select' => 4
            ]);
    }

    public function datosPadresPost(CreatePadresRequest $request, $folioId, $inscripcionId)
    {
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);
        $madre = new Padre();
        $padre = new Padre();
        $madre->fill($request->padres[0]);
        $madre->parentesco = "madre";
        $padre->fill($request->padres[1]);
        $padre->parentesco = "padre";
        $padres['madre'] = $madre;
        $padres['padre'] = $padre;
        \Session::put('padres', $padres);
        return redirect()->route('inscripcion_datos_emergencia', ['folio' => $folioId, 'inscripcion' => $inscripcionId]);

    }

    public function datosEmergencia($inscripcionId, $folioId)
    {
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);

        return view('inscripcion.inscripcion',
            [
                'folio' => $folio,
                'inscripcion' => $inscripcion,
                'select' => 5
            ]);
    }

    public function datosEmergenciaPost(CreateEmergenciaRequest $request, $folioId, $inscripcionId)
    {
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);
        $emergencia = new Emergencia();
        $emergencia->fill($request->all());
        \Session::put('emergencia', $emergencia);
        return redirect()->route('inscripcion_datos_personas_aut', ['inscripcion' => $inscripcionId, 'folio' => $folioId,]);
    }

    public function datosPersonasAut($folioId, $inscripcionId)
    {
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);

        return view('inscripcion.inscripcion',
            [
                'folio' => $folio,
                'inscripcion' => $inscripcion,
                'select' => 6
            ]);
    }

    public function datosPersonasAutPost(CreatePersonasAutRequest $request, $folioId, $inscripcionId)
    {
        $aut = new PersonasAut();
        $aut->fill($request->all());
        \Session::put('personasAut', $aut);
        return redirect()->route('inscripcion_datos_eventos', ['folio' => $folioId, 'inscripcion' => $inscripcionId]);
    }

    public function datosEventos($inscripcionId, $folioId)
    {
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);

        return view('inscripcion.inscripcion',
            [
                'folio' => $folio,
                'inscripcion' => $inscripcion,
                'select' => 7
            ]);
    }

    public function datosEventosPost(CreateEventosRequest $request, $folioId, $inscripcionId)
    {
        $eventos = new Eventos();
        $eventos->fill($request->all());
        \Session::put('eventos', $eventos);
        return $this->finalSave($folioId, $inscripcionId);

    }

    public function datosIntegracion($inscripcionId, $folioId)
    {
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);
        return view('inscripcion.inscripcion',
            [
                'folio' => $folio,
                'inscripcion' => $inscripcion,
                'select' => 3
            ]);
    }

    public function datosIntegracionPost(CreateIntegracionRequest $request, $inscripcionId, $folioId)
    {
        $familia = new Familias();
        $familia->fill($request->all());
        \Session::put("familia", $familia);
        return redirect()->route('inscripcion_datos_padres', ['folio' => $folioId, 'inscripcion' => $inscripcionId]);
    }

    public function datosSalud($inscripcionId, $folioId)
    {
        $alumno = \Session::get('alumno');
        $folio = Folios::find($folioId);
        $inscripcion = Inscripciones::find($inscripcionId);
        return view('inscripcion.inscripcion',
            [
                'folio' => $folio,
                'inscripcion' => $inscripcion,
                'alumno' => $alumno,
                'select' => 2
            ]);
    }

    public function datosSaludPost(CreateSaludRequest $request, $folioId, $inscripcionId)
    {
        $alumno = \Session::get('alumno');
        $inscripcion = Inscripciones::find($inscripcionId);
//        return dd($request->all());
//        $alumno->fill($request->all());
        $alumno->inscripcion_id = $inscripcionId;

        $infSalud = new InfSalud();
        $infSalud->fill($request->inf_salud);
//        return dd($infSalud);
        $enfermedades = new Enfermedades();
        $enfermedades->fill($request->enfermedades);
        $detectado = new Detectado();
        $detectado->fill($request->detectado);
        $antecedente = new AntecedesntesHereditarios();
        $antecedente->fill($request->antecedente);

        $salud["infSalud"] = $infSalud;
        $salud["enfermedades"] = $enfermedades;
        $salud["detectado"] = $detectado;
        $salud["antecedente"] = $antecedente;

        \Session::put('salud', $salud);

        return redirect()->route('inscripcion_datos_integracion', ['folio' => $folioId, 'inscripcion' => $inscripcionId]);
    }

    public function finalSave($folioId, $inscripcionId)
    {
        try {
//            return dd(\Session::all());
            $alumno = \Session::get('alumno');
            $inf_salud = \Session::get('salud')['infSalud'];
            $enfermedades = \Session::get('salud')['enfermedades'];
            $detectado = \Session::get('salud')['detectado'];
            $antecedentes = \Session::get('salud')['antecedente'];
            $padre = \Session::get('padres')['padre'];
            $madre = \Session::get('padres')['madre'];
            $emergencia = \Session::get('emergencia');
            $familia = \Session::get('familia');
            $eventos = \Session::get('eventos');
            $personasAut = \Session::get('personasAut');
            $inscripcion = Inscripciones::find($inscripcionId);


            DB::beginTransaction();
            $año = 18;
            $cct = 27;
            if (Alumno::count() === 0) {
                $ctrl = 10 + Alumno::count() + 1;
                $noCtrl = $año . $cct . $ctrl;
                $alumno->no_control = $noCtrl;
            } else {
                $ctrl = Alumno::all()->last()->no_control;
                $ctrl = substr($ctrl, -2) * 1;
                $ctrl = $ctrl + 1;
                $noCtrl = $año . $cct . $ctrl;
                $alumno->no_control = $noCtrl;
            }

            $base = 'JN';
            $digits = 4;
            $rnd = str_pad(rand(0, pow(10, $digits) - 1), $digits, '0', STR_PAD_LEFT);
            $password = $base . $rnd;
            $alumno->password = $password;
            $alumno->password = bcrypt($alumno->password);
            $transactionOk = $alumno->save();
            if ($transactionOk) {
                $inf_salud->alumno_id = $alumno->id;
                $transactionOk = $inf_salud->save();
            }

            if ($transactionOk) {
                $enfermedades->salud_id = $inf_salud->id;
                $transactionOk = $enfermedades->save();
            }

            if ($transactionOk) {
                $antecedentes->salud_id = $inf_salud->id;
                $transactionOk = $antecedentes->save();
            }

            if ($transactionOk) {
                $detectado->salud_id = $inf_salud->id;
                $transactionOk = $detectado->save();
            }

            if ($transactionOk) {
                $eventos->alumno_id = $alumno->id;
                $transactionOk = $eventos->save();
            }

            if ($transactionOk) {
                $familia->alumno_id = $alumno->id;
                $transactionOk = $familia->save();
            }
            if ($transactionOk) {
                $personasAut->familia_id = $familia->id;
                $transactionOk = $personasAut->save();
            }
            if ($transactionOk) {
                $padre->familia_id = $familia->id;
                $transactionOk = $padre->save();
            }
            if ($transactionOk) {
                $madre->familia_id = $familia->id;
                $transactionOk = $madre->save();
            }
            if ($transactionOk) {
                $emergencia->familia_id = $familia->id;
                $transactionOk = $emergencia->save();
            }


            if ($transactionOk) {
                DB::commit();
                $pdfOk = true;
                return view('inscripcion.confirmation_pdf', [
                    'alumno' => $alumno,
                    'salud' => $inf_salud,
                    'enfermedades' => $enfermedades,
                    'detectado' => $detectado,
                    'antecedentes' => $antecedentes,
                    'padre' => $padre,
                    'madre' => $madre,
                    'emergencia' => $emergencia,
                    'familia' => $familia,
                    'eventos' => $eventos,
                    'personasAut' => $personasAut,
                    'inscripcion' => $inscripcion,
                    'pdfOk' => $pdfOk
                ]);

                $view = \View::make('inscripcion.pdf', [
                    'salud' => $alumno,
                    'inf_salud' => $inf_salud,
                    'enfermedades' => $enfermedades,
                    'detectado' => $detectado,
                    'antecedentes' => $antecedentes,
                    'padre' => $padre,
                    'madre' => $madre,
                    'emergencia' => $emergencia,
                    'familia' => $familia,
                    'eventos' => $eventos,
                    'personasAut' => $personasAut,
                    'inscripcion' => $inscripcion,
                    'pdfOk' => $pdfOk
                ])->render();
                $pdf = \App::make('dompdf.wrapper');
                $pdf->loadHTML($view);
                return $pdf->stream('invoice');

            } else {
                DB::rollBack();
                return dd(":'v");
            }
        } catch (\Exception $e) {
            return dd($e);
        }
    }
}








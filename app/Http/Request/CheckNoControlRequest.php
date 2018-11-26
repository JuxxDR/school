<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 05:42 PM
 */

namespace App\Http\Request;


use App\Model\Alumno;
use App\model\Folios;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CheckNoControlRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $noControl = \Request::input('no_control', null);
//        $alumno = Alumno::whereNoControl($noControl);

        return [
            'no_control' => 'required|exists:alumnos,no_control',
            'password' => 'required',
            Rule::exists('alumnos', 'password')->where(function ($query) use ($noControl) {
                $query->where('no_control', $noControl);
            })
        ];
    }

    public function messages()
    {
        return [
            'no_control.required' => 'Ingrese un número de control',
            'no_control.exists' => 'El número de control que se ingreso no existe.',
            'password.required' => 'La contraseña es requerida .',
            'password.exists' => 'Contrasñea inválida.'
        ];
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 05:42 PM
 */

namespace App\Http\Request;


use App\model\Folios;
use Illuminate\Foundation\Http\FormRequest;

class CheckNoControlRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'no_control' => 'required|exists:alumnos,no_control'
        ];
    }

    public function messages()
    {
        return [
            'no_control.required' => 'Ingrese un número de control',
            'no_control.exists' => 'El número de control que se ingreso no existe.'
        ];
    }


}
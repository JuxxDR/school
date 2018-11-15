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

class CreateAlumnRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return Alumno::rules();
    }

    public function messages()
    {
        return Alumno::messages();
    }


}
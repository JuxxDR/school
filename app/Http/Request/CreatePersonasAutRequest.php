<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 05:42 PM
 */

namespace App\Http\Request;


use App\model\PersonasAut;
use Illuminate\Foundation\Http\FormRequest;

class CreatePersonasAutRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return PersonasAut::rules();

    }

    public function messages()
    {
        return PersonasAut::messages();
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: presa
 * Date: 21/10/2018
 * Time: 05:42 PM
 */

namespace App\Http\Request;


use App\model\InfSalud;
use Illuminate\Foundation\Http\FormRequest;

class CreateSaludRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return InfSalud::rules('inf_salud.');
    }

    public function messages()
    {
        return InfSalud::messages('inf_salud.');
    }

}